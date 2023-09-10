<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Research') }}
        </h2>
    </x-slot>

    <br>

    <div class="container">
        <div class="border-b pb-4 mb-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-xl font-semibold">New Project</h1>
                <!-- Button to open the modal -->
                <!-- <button id="openModalButton1" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button> -->
            </div>

            <div class="card shadow-sm">

                <div class="px-4 mt-4">
                    <h2 class="text-lg font-semibold">Project Leader</h2>
                    <p>{{ $projectLeaderName }}</p>
                </div>

                <!-- Add Participant Section -->
                <div class="px-4 mt-4 flex items-center">
                    <label for="newParticipant" class="text-lg font-semibold mr-4">Add Participant:</label>
                    <input type="text" id="newParticipant" name="newParticipant" class="p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500">
                    <button id="addParticipantBtn" type="button" class="flex items-center justify-center w-10 h-10 ml-2 text-white bg-blue-500 rounded-full hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </button>
                </div>

                <!-- Selected Team Members Section -->
                <div class="px-4 mb-4 mt-4">
                    <h2 class="text-lg font-semibold">Research Associate:</h2>
                    <ul id="selectedTeamMembersList">
                        @foreach($selectedTeamMembers as $selectedMember)
                        <li>{{ $selectedMember->name }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Project Title Input Form -->
                <div class="px-4 mt-4">
                    <label for="projectTitle" class="text-lg font-semibold mr-2">Project Title:</label>
                    <input type="text" id="projectTitle" name="projectTitle" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500">
                </div>

                <div class="px-4 mt-4">
                    <label for="description" class="text-lg font-semibold">Description:</label>
                </div>
                <div class="px-4">
                    <textarea id="description" name="description" rows="4" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500"></textarea>
                </div>

                <!-- Start and End Date Input Forms -->
                <div class="px-4 mt-4 mb-4 flex">
                    <div class="mr-8">
                        <label for="startDate" class="text-lg font-semibold mr-2">Start Date:</label>
                        <input type="date" id="startDate" name="startDate" class="p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="endDate" class="text-lg font-semibold ml-4 mr-2">End Date:</label>
                        <input type="date" id="endDate" name="endDate" class="p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500">
                    </div>
                </div>

            </div>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-semibold">Budget</h1>
            <!-- Button to open the modal -->
            <button id="openModalButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </button>
        </div>

        <!-- Modal Container (hidden by default) -->
        <div id="modalContainer" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-opacity-75 bg-gray-800 hidden">
            <!-- Modal Content -->
            <div class="bg-white p-4 rounded shadow-lg">
                <!-- Modal Header -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-bold">Budget Form</h2>
                    <button id="closeModalButton" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Budget Form -->
                <form action="{{ route('research.budget.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="itemList" class="block mb-2 text-gray-700">List of Items (comma-separated):</label>
                        <input type="text" id="itemList" name="itemList" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="amount" class="block mb-2 text-gray-700">Amount:</label>
                        <input type="number" id="amount" name="amount" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="researchCategory" class="block mb-2 text-gray-700">Research Category:</label>
                        <select id="researchCategory" name="researchCategory" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500" required>
                            <option value="category1">Category...</option>
                            <option value="equipment">equipment</option>
                            <option value="material">material</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="budgetInstallments" class="block mb-2 text-gray-700">Number of Budget Installments:</label>
                        <input type="number" id="budgetInstallments" name="budgetInstallments" class="w-full p-2 border border-gray-400 rounded-lg focus:outline-none focus:border-indigo-500" required>
                    </div>
                    <!-- Add more fields as needed -->

                    <!-- Modal Footer -->
                    <div class="flex justify-end">
                        <button id="saveBudgetButton" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Save Budget
                        </button>
                        <button id="closeModalButton2" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- ... (rest of the code) ... -->

        <div class="mb-4">
            @if (count($dataFromDatabase) > 0)
            <table id="dataTable" class="w-full bg-white border mt-2 shadow-sm">
                <!-- Table Header -->
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Item List</th>
                        <th class="border px-4 py-2">Amount</th>
                        <th class="border px-4 py-2">Category</th>
                        <th class="border px-4 py-2">Installments</th>
                        <th class="border px-4 py-2">Created At</th>
                        <th class="border px-4 py-2">Total</th>
                    </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                    @foreach($dataFromDatabase as $item)
                    <tr id="row-{{ $item->id }}"> <!-- Add unique identifier -->
                        <td class="border px-4 py-2">{{ $item->itemList }}</td>
                        <td class="border px-4 py-2">{{ $item->amount }}</td>
                        <td class="border px-4 py-2">{{ $item->researchCategory }}</td>
                        <td class="border px-4 py-2">{{ $item->budgetInstallments }}</td>
                        <td class="border px-4 py-2">{{ $item->created_at }}</td>
                        <td class="px-4 py-2"></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td class="border px-4 py-2 font-semibold" colspan="5">Total Equipment Amount:</td>
                        <td id="totalEquipmentAmount" class="border px-4 py-2 font-semibold text-right"></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold" colspan="5">Total Material Amount:</td>
                        <td id="totalMaterialAmount" class="border px-4 py-2 font-semibold text-right"></td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold" colspan="5">Total Sum Amount:</td>
                        <td id="totalSumAmount" class="border px-4 py-2 font-semibold text-right"></td>
                    </tr>
                </tbody>
            </table>
            @else
            <p>No projects available.</p>
            @endif
        </div>


        <!-- Save Button and Cancel Button -->
        <div class="flex justify-end mt-4">
            <button id="saveAndGoBackButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Save
            </button>
            <button id="cancelButton" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-2">
                Cancel
            </button>
        </div>
    </div>

    <br>

    </div>
    <!-- ... Existing HTML code ... -->

    <!-- JavaScript to handle adding participants -->
    <script>
        // Calculate and update the total amount
        function updateTotalAmount() {
            const rows = document.querySelectorAll('#dataTable tbody tr');
            let totalEquipment = 0;
            let totalMaterial = 0;
            let totalSum = 0; // Initialize the total sum

            rows.forEach(row => {
                const amountCell = row.querySelector('td:nth-child(2)'); // Amount column is the second column
                const categoryCell = row.querySelector('td:nth-child(3)'); // Category column is the third column

                if (amountCell && categoryCell) {
                    const amountValue = parseFloat(amountCell.textContent.replace(',', '.')); // Replace comma with period if needed
                    if (!isNaN(amountValue)) {
                        if (categoryCell.textContent === 'equipment') {
                            totalEquipment += amountValue;
                        } else if (categoryCell.textContent === 'material') {
                            totalMaterial += amountValue;
                        }
                        totalSum += amountValue; // Add the amount to the total sum
                    }
                }
            });

            const totalEquipmentCell = document.getElementById('totalEquipmentAmount');
            if (totalEquipmentCell) {
                totalEquipmentCell.textContent = totalEquipment.toFixed(2); // Format the total to two decimal places
            }

            const totalMaterialCell = document.getElementById('totalMaterialAmount');
            if (totalMaterialCell) {
                totalMaterialCell.textContent = totalMaterial.toFixed(2); // Format the total to two decimal places
            }

            const totalSumCell = document.getElementById('totalSumAmount');
            if (totalSumCell) {
                totalSumCell.textContent = totalSum.toFixed(2); // Format the total to two decimal places
            }
        }

        // Call the updateTotalAmount function initially
        updateTotalAmount();



        // JavaScript for adding participants
        document.addEventListener('DOMContentLoaded', function() {
            const addParticipantBtn = document.getElementById('addParticipantBtn');
            const newParticipantInput = document.getElementById('newParticipant');
            const selectedTeamMembersList = document.getElementById('selectedTeamMembersList');

            addParticipantBtn.addEventListener('click', function() {
                const newParticipantName = newParticipantInput.value.trim();
                if (newParticipantName !== '') {
                    const newParticipantItem = document.createElement('li');
                    newParticipantItem.textContent = newParticipantName;
                    selectedTeamMembersList.appendChild(newParticipantItem);
                    newParticipantInput.value = ''; // Clear the input
                }
            });
        });

        // Get the modal related elements
        const openModalButton = document.getElementById('openModalButton');
        const modalContainer = document.getElementById('modalContainer');
        const closeModalButton = document.getElementById('closeModalButton');
        const closeModalButton2 = document.getElementById('closeModalButton2');
        const saveBudgetButton = document.getElementById('saveBudgetButton');

        // Get the "Save" button and "Cancel" button
        const saveAndGoBackButton = document.getElementById('saveAndGoBackButton');
        const cancelButton = document.getElementById('cancelButton');

        // Get references to the select element and the display area
        const selectUser = document.getElementById('selectedUser');
        const selectedUserData = document.getElementById('selectedUserData');

        const deleteRoute = "{{ route('research-budget.delete', '') }}";

        // Function to open the modal
        function openModal() {
            modalContainer.classList.remove('hidden');
        }

        // Function to close the modal
        function closeModal() {
            modalContainer.classList.add('hidden');
        }

        // Add click event listener to the button to open the modal
        openModalButton.addEventListener('click', openModal);

        // Add click event listener to the close button to close the modal
        closeModalButton.addEventListener('click', closeModal);

        // Add click event listener to the close button to close the modal
        closeModalButton2.addEventListener('click', closeModal);

        // Add click event listener to the "Save Budget" button
        saveBudgetButton.addEventListener('click', () => {
            // Perform your budget saving logic here

            // Close the modal
            closeModal();
        });

        // Add click event listener to the "Save" button
        saveAndGoBackButton.addEventListener('click', () => {
            // Perform your saving logic here

            // Redirect to the project page
            window.location.href = "{{ route('project') }}";
        });

        // Add click event listener to the "Cancel" button
        cancelButton.addEventListener('click', () => {
            const rowsToDelete = document.querySelectorAll('[id^="row-"]');

            // Prepare an array to hold the IDs of rows to delete
            const rowIdsToDelete = [];
            rowsToDelete.forEach(row => {
                rowIdsToDelete.push(row.id.replace('row-', ''));
            });

            // Send AJAX request to delete data from the database
            fetch(deleteRoute + '/' + rowIdsToDelete.join(','), {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Remove the rows from the table
                        rowsToDelete.forEach(row => {
                            row.remove();
                        });

                        // Redirect to the project page
                        window.location.href = "{{ route('project') }}";
                    } else {
                        console.error('Error deleting data.');
                    }
                })
                .catch(error => {
                    console.error('AJAX request error:', error);
                });
            updateTotalAmount();
        });

        // Add an event listener to the select element
        selectUser.addEventListener('change', function() {
            // Get the selected option's text (user's name)
            const selectedUserName = selectUser.options[selectUser.selectedIndex].text;

            // Update the display area with the selected user's name
            selectedUserData.textContent = `Selected User: ${selectedUserName}`;
        });

        // Call the updateTotalAmount function initially
        updateTotalAmount();
    </script>

</x-app-layout>