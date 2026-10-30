<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();

        return view('profile.edit', [
            'user' => $user,
            'transferUsers' => User::query()
                ->where('id', '!=', $user->id)
                ->orderBy('name')
                ->get(['id', 'name', 'email']),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')
            ->with('status', 'profile-updated');
    }

    /**
     * Transfer the user's students, then delete the account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validateWithBag('userDeletion', [
            'password' => [
                'required',
                'current_password',
            ],

            'transfer_to_user_id' => [
                'required',
                'integer',
                'exists:users,id',
                Rule::notIn([$user->id]),
            ],
        ]);

        DB::transaction(function () use ($user, $validated) {

            // Lock and verify the selected recipient.
            $recipient = User::query()
                ->whereKey($validated['transfer_to_user_id'])
                ->lockForUpdate()
                ->first();

            if (!$recipient) {
                throw ValidationException::withMessages([
                    'transfer_to_user_id' => 'المستخدم المستلم لم يعد موجوداً.',
                ]);
            }

            // Transfer all students to the selected user.
            Student::where('user_id', $user->id)
                ->update([
                    'user_id' => $recipient->id,
                ]);

            // Delete the original user only after transferring students.
            $user->delete();
        });

        // Log out after the database transaction succeeds.
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
