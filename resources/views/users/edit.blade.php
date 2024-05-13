@extends('layouts.master')

@section('content')
    <div
        class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')_*_1)] pb-[calc(theme('spacing.header')_*_0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')_*_1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')_*_1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_*_0.9)]">
        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">

            <div class="flex flex-col gap-2 py-4 md:flex-row md:items-center print:hidden">
                <div class="grow">
                    <h5 class="text-16">List Users</h5>
                </div>
                <ul class="flex items-center gap-2 text-sm font-normal shrink-0">
                    <li
                        class="relative before:content-['\ea54'] before:font-remix ltr:before:-right-1 rtl:before:-left-1  before:absolute before:text-[18px] before:-top-[3px] ltr:pr-4 rtl:pl-4 before:text-slate-400 dark:text-zink-200">
                        <a href="{{ route('users.index') }}" class="text-slate-400 dark:text-zink-200">Users</a>
                    </li>
                    <li class="text-slate-700 dark:text-zink-100">
                        List Users
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('users/' . $user->id . '') }}" class="mt-10" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <input type="hidden" value="{{ $user->avatar }}" id="avatar_id">
                            <label for="avatar" class="inline-block mb-2 text-base font-medium">Your Profile</label>
                            <input id="upload" type="file" class="hidden" name="avatar" accept="image/*" />
                            <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                                <div class="px-4 py-6">
                                    <div id="image-preview"
                                        class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                        <label for="upload" class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                            </svg>
                                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture
                                            </h5>
                                            <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be
                                                less
                                                than <b class="text-gray-600">2mb</b></p>
                                            <p class="font-normal text-sm text-gray-400 md:px-6">and should be in <b
                                                    class="text-gray-600">JPG, PNG, or GIF</b> format.</p>
                                            <span id="filename" class="text-gray-500 bg-gray-200 z-50"></span>
                                        </label>
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <div class="w-full">
                                            <label
                                                class="w-full text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center mr-2 mb-2 cursor-pointer">
                                                <span class="text-center ml-2">Upload</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="inline-block mb-2 text-base font-medium">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter name" value="{{ $user->name }}">
                            <p id="name" class="mt-1 text-sm text-red-500"></p>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="inline-block mb-2 text-base font-medium">Username</label>
                            <input type="text" name="username" id="username"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter Username" value="{{ $user->username }}">
                        </div>
                        <div class="mb-3">

                            <label for="roles" class="inline-block mb-2 text-base font-medium">Roles</label>
                            <select
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                data-choices="" name="roles" id="roles">
                                <option value="">please choose your Role</option>
                                @foreach ($roles as $id => $name)
                                    <option value="{{ $name }}"
                                        {{ $user->roles->contains('name', $name) ? 'selected' : '' }}>
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="inline-block mb-2 text-base font-medium">Gender</label>
                            <select
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                data-choices="" name="gender" id="gender">
                                <option value="">please choose your gender</option>
                                <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male
                                </option>
                                <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>
                                    Female
                                </option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="inline-block mb-2 text-base font-medium">Email</label>
                            <input type="text" name="email" id="email"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter email" value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="inline-block mb-2 text-base font-medium">Your Phone
                                Number</label>
                            <input type="number" name="phone_number" id="number_edit"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter Phone Number"value="{{ $user->phone_number }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="inline-block mb-2 text-base font-medium">Password</label>
                            <input type="password" name="password" id="password_edit"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter password">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="inline-block mb-2 text-base font-medium">Password
                                Confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation_edit"
                                class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Enter password confirmation">
                        </div>
                        <div class="mt-10">
                            <button type="submit"
                                class="w-full text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Add
                                User</button>
                        </div>
                    </form>
                </div>
            </div><!--end card-->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-wrapper -->
@endsection
@section('script')
    <script>
        const uploadInput = document.getElementById('upload');
        const filenameLabel = document.getElementById('filename');
        const imagePreview = document.getElementById('image-preview');
        const avatarIdInput = document.getElementById('avatar_id');

        // Check if the event listener has been added before
        let isEventListenerAdded = false;
        console.log(avatarIdInput.value);
        if (avatarIdInput.value) {
            imagePreview.innerHTML =
                `<img src="{{ asset($user->avatar) }}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" "/>`;
            imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');
            if (!isEventListenerAdded) {
                imagePreview.addEventListener('click', () => {
                    uploadInput.click();
                });

                isEventListenerAdded = true;
            }
        }
        uploadInput.addEventListener('change', (event) => {
            const file = event.target.files[0];

            if (file) {
                filenameLabel.textContent = file.name;

                const reader = new FileReader();
                reader.onload = (e) => {
                    imagePreview.innerHTML =
                        `<img src="${e.target.result}" class="max-h-48 rounded-lg mx-auto" alt="Image preview" />`;
                    imagePreview.classList.remove('border-dashed', 'border-2', 'border-gray-400');

                    // Add event listener for image preview only once
                    if (!isEventListenerAdded) {
                        imagePreview.addEventListener('click', () => {
                            uploadInput.click();
                        });

                        isEventListenerAdded = true;
                    }
                };
                reader.readAsDataURL(file);
            } else {

                filenameLabel.textContent = '';
                imagePreview.innerHTML =
                    `<div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center text-gray-500">No image preview</div>`;
                imagePreview.classList.add('border-dashed', 'border-2', 'border-gray-400');

                // Remove the event listener when there's no image
                imagePreview.removeEventListener('click', () => {
                    uploadInput.click();
                });

                isEventListenerAdded = false;
            }
        });

        uploadInput.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    </script>
@endsection
