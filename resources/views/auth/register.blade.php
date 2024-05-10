@extends('layouts.app')
@section('content')
    <div class="mb-0 w-screen lg:w-[500px] card shadow-lg border-none shadow-slate-100 relative">
        <div class="!px-10 !py-12 card-body">
            <a href="#!">
                <img src="assets/images/logo-light.png" alt="" class="hidden h-6 mx-auto dark:block">
                <img src="assets/images/logo-dark.png" alt="" class="block h-6 mx-auto dark:hidden">
            </a>

            <div class="mt-8 text-center">
                <h4 class="mb-1 text-custom-500 dark:text-custom-500">Create your free account</h4>
                <p class="text-slate-500 dark:text-zink-200">Get your free Sistem Tambang account now</p>
            </div>

            <form action="{{ route('register') }}" class="mt-10" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="avatar" class="inline-block mb-2 text-base font-medium">Your Profile</label>
                    <input id="upload" type="file" class="hidden" name="avatar" accept="image/*" />
                    <div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden items-center">
                        <div class="px-4 py-6">
                            <div id="image-preview"
                                class="max-w-sm p-6 mb-4 bg-gray-100 border-dashed border-2 border-gray-400 rounded-lg items-center mx-auto text-center cursor-pointer">
                                <label for="upload" class="cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-700 mx-auto mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-700">Upload picture</h5>
                                    <p class="font-normal text-sm text-gray-400 md:px-6">Choose photo size should be less
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
                    <label for="username-field" class="inline-block mb-2 text-base font-medium">Name</label>
                    <input type="text" name="name" id="username-field"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Enter name">
                    <p id="username-field" class="mt-1 text-sm text-red-500"></p>
                </div>
                <div class="mb-3">
                    <label for="username-field-1" class="inline-block mb-2 text-base font-medium">Username</label>
                    <input type="text" name="username" id="username-field-1"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Enter Username">
                </div>
                <div class="mb-3">
                    <label for="gender" class="inline-block mb-2 text-base font-medium">Gender</label>
                    <select
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        data-choices="" name="gender" id="gender">
                        <option value="">please choose your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email-field" class="inline-block mb-2 text-base font-medium">Email</label>
                    <input type="text" name="email" id="email-field"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Enter email">
                </div>
                <div class="mb-3">
                    <label for="number" class="inline-block mb-2 text-base font-medium">Your Phone Number</label>
                    <input type="number" name="phone_number" id="number"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Enter Phone Number">
                </div>
                <div class="mb-3">
                    <label for="password" class="inline-block mb-2 text-base font-medium">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Enter password">
                </div>
                <div class="mb-3">
                    <label for="password" class="inline-block mb-2 text-base font-medium">Password Confirmation</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Enter password confirmation">
                </div>
                <p class="italic text-15 text-slate-500 dark:text-zink-200">By registering you agree to the Sistem Tambang <a
                        href="#!" class="underline">Terms of Use</a></p>
                <div class="mt-10">
                    <button type="submit"
                        class="w-full text-white transition-all duration-200 ease-linear btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Sign
                        In</button>
                </div>
                <div
                    class="relative text-center my-9 before:absolute before:top-3 before:left-0 before:right-0 before:border-t before:border-t-slate-200 dark:before:border-t-zink-500">
                    <h5
                        class="inline-block px-2 py-0.5 text-sm bg-white text-slate-500 dark:bg-zink-600 dark:text-zink-200 rounded relative">
                        Create account with</h5>
                </div>
                <div class="flex flex-wrap justify-center gap-2">
                    <button type="button"
                        class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 active:text-white active:bg-custom-600 active:border-custom-600"><i
                            data-lucide="facebook" class="w-4 h-4"></i></button>
                    <button type="button"
                        class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-orange-500 border-orange-500 hover:text-white hover:bg-orange-600 hover:border-orange-600 focus:text-white focus:bg-orange-600 focus:border-orange-600 active:text-white active:bg-orange-600 active:border-orange-600"><i
                            data-lucide="mail" class="w-4 h-4"></i></button>
                    <button type="button"
                        class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-sky-500 border-sky-500 hover:text-white hover:bg-sky-600 hover:border-sky-600 focus:text-white focus:bg-sky-600 focus:border-sky-600 active:text-white active:bg-sky-600 active:border-sky-600"><i
                            data-lucide="twitter" class="w-4 h-4"></i></button>
                    <button type="button"
                        class="flex items-center justify-center size-[37.5px] transition-all duration-200 ease-linear p-0 text-white btn bg-slate-500 border-slate-500 hover:text-white hover:bg-slate-600 hover:border-slate-600 focus:text-white focus:bg-slate-600 focus:border-slate-600 active:text-white active:bg-slate-600 active:border-slate-600"><i
                            data-lucide="github" class="w-4 h-4"></i></button>
                </div>

                <div class="mt-10 text-center">
                    <p class="mb-0 text-slate-500 dark:text-zink-200">Already have an account ?
                        <a href="{{ route('login') }}"
                            class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
    const uploadInput = document.getElementById('upload');
    const filenameLabel = document.getElementById('filename');
    const imagePreview = document.getElementById('image-preview');
  
    // Check if the event listener has been added before
    let isEventListenerAdded = false;
  
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
