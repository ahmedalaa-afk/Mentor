<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Service\FileUploadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    protected $fileUploadService;
    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('user.profile.edit');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'image' => 'image|max:2048', // Max 2MB
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($user->image) {
                $this->fileUploadService->deleteImage($user->image);
            }

            // Store new image
            $user->image = $this->fileUploadService->uploadImage($request->file('image'),'profile-images');
            $user->save();
        }

        return redirect()->back()->with('message', 'Profile photo updated successfully!');
    }
}
