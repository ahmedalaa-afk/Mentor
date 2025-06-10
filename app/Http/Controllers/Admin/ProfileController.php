<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\FileUploadService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        return view('admin.profile.edit');
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
            $user->image = $this->fileUploadService->uploadImage($request->file('image'), 'profile-images');
            $user->save();
        }

        return redirect()->back()->with('message', 'Profile photo updated successfully!');
    }
}
