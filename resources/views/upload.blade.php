<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload') }}
        </h2>
    </x-slot>

    <br>

    <div class="container">

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('form.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Form Section -->
                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-4">
                    <div class="text-lg font-bold mb-4">Project Name..</div>
                    <!-- Form Content -->
                    <div class="mb-4">
                        <label for="bill_date" class="block mb-2 text-gray-700">Bill date:</label>
                        <input type="date" id="bill_date" name="bill_date" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500" required>
                        @error('bill_date')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name</label>
                        <input type="text" id="project_name" name="project_name" class="mt-1 p-2 w-full border rounded-lg focus:outline-none focus:border-blue-500">
                        @error('project_name')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="project_type" class="block mb-2 text-gray-700">Select a type:</label>
                        <select id="project_type" name="project_type" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500" required>
                            <option value="" disabled selected>Select an option...</option>
                            <option value="True">True</option>
                            <option value="False">False</option>
                            <option value="option3">Option 3</option>
                        </select>
                        @error('project_type')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block mb-2 text-gray-700">Description:</label>
                        <textarea id="description" name="description" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="quantity" class="block mb-2 text-gray-700">Cost:</label>
                        <input id="quantity" name="quantity" type="number" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500">
                    </div>

                    <!-- Add this inside your form -->
                    <div class="mb-4">
                        <label for="file_path" class="block mb-2 text-gray-700">Choose a file:</label>
                        <div class="relative border border-gray-400 rounded-md p-2 bg-white shadow-md">
                            <input id="file_path" name="file_path" type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" onchange="displayImage(this)" />
                            <div class="text-center">
                                <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">Select a file</p>
                            </div>
                        </div>
                    </div>


                    <!-- Add other form elements here -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Save
                        </button>
                        <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </button>
                    </div>
                </div>

                <!-- Display the selected image -->
                <div class="flex justify-center items-center bg-white border border-gray-300 shadow-lg rounded-lg p-4 text-center">
                    <img id="selectedImage" src="{{ asset('images/placeholder.jpg') }}" alt="Selected File">
                </div>
            </div>
        </form>

        <br>

        <!-- Display Table -->
        @if (count($Projects) > 0)
        <table class="w-full bg-white border shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No.</th>
                    <th class="border px-4 py-2">Project title</th>
                    <th class="border px-4 py-2">Quantity</th>
                    <th class="border px-4 py-2">Year</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach ($Projects as $Project)
                <tr>
                    <td class="border px-4 py-2">{{ $Project->id }}</td>
                    <td class="border px-4 py-2">{{ $Project->description }}</td>
                    <td class="border px-4 py-2">{{ $Project->quantity }}</td>
                    <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($Project->bill_date)->format('Y') }}</td>
                    <!-- Add more columns as needed -->
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No projects available.</p>
        @endif
    </div>

    <br>

    <script>
        function displayImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('selectedImage').src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


</x-app-layout>