<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Polls') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold mb-4">Polls List</h1>

                    <table id="pollsTable" class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Question</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Options</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Views</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be populated here via JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for editing views -->
    <div class="hidden fixed inset-0 bg-black bg-opacity-50 overflow-y-auto" id="editViewsModal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Modal content -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <!-- Heroicon name: outline/exclamation -->
                            <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6 0a6 6 0 1 1 12 0 6 6 0 0 1-12 0zm2-15a7 7 0 1 0 0 14 7 7 0 0 0 0-14z" />
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Edit Views
                            </h3>
                            <div class="mt-2">
                                <input type="number" id="viewsInput" class="w-full px-3 py-2 border rounded-md" placeholder="Enter new views" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button onclick="saveEditedViews()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Save
                    </button>
                    <button onclick="closeEditViewsModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const pollsTable = document.getElementById("pollsTable");

            // Make an AJAX request to fetch JSON data from the show-poll route
            fetch("{{ route('show-poll-Json') }}") // Use the route name here
                .then(response => response.json())
                .then(data => {
                    // Get a reference to the table body
                    const tbody = pollsTable.querySelector("tbody");

                    // Iterate through the data and create table rows
                    data.forEach(poll => {
                        const row = document.createElement("tr");

                        // Create table cells and populate with data
                        const idCell = document.createElement("td");
                        idCell.textContent = poll.id;

                        const questionCell = document.createElement("td");
                        questionCell.textContent = poll.question;

                        // Create a cell for options and join them as a string
                        const optionsCell = document.createElement("td");
                        const options = poll.options.map(option => option.option_text).join(', ');
                        optionsCell.textContent = options;

                        const viewsCell = document.createElement("td");
                        viewsCell.textContent = poll.views;

                        const actionsCell = document.createElement("td");

                        // Create an "Edit" button and add an event listener
                        const editButton = document.createElement("button");
                        editButton.textContent = "Edit";
                        editButton.classList.add("text-green-600", "mr-5", "hover:text-green-900");
                        editButton.onclick = function () {
                            // Call a function to open the edit views modal
                            openEditViewsModal(poll.id, poll.views);
                        };

                        actionsCell.appendChild(editButton);

                        // Create a "Delete" link and add an event listener
                        const deleteLink = document.createElement("a");
                        deleteLink.textContent = "Delete";
                        deleteLink.classList.add("text-indigo-600", "hover:text-indigo-900");
                        deleteLink.onclick = function () {
                            if (confirm('Are you sure you want to delete this poll?')) {
                                var deletePollRoute = "{{ route('delete-poll', ['unique_identifier' => ':unique_identifier']) }}";
                                fetch(deletePollRoute.replace(':unique_identifier', poll.unique_identifier), {
                                    method: 'GET',
                                    headers: {
                                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                                    },
                                })
                                    .then(response => response.json())
                                    .then(result => {
                                        if (result.success) {
                                            // Remove the row from the table

                                            // reload the page
                                            location.reload();

                                        } else {
                                            console.error("Error deleting poll.");
                                        }
                                    })
                                    .catch(error => {
                                        console.error("Error deleting poll: ", error);
                                    });
                            }
                        };

                        actionsCell.appendChild(deleteLink);

                        // Append cells to the row
                        row.appendChild(idCell);
                        row.appendChild(questionCell);
                        row.appendChild(optionsCell);
                        row.appendChild(viewsCell);
                        row.appendChild(actionsCell);

                        // Append the row to the table body
                        tbody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error("Error fetching data: ", error);
                });
        });

        let currentPollId;

        function openEditViewsModal(pollId, currentViews) {
            // Set the current views value in the input field
            document.getElementById('viewsInput').value = currentViews;

            // Store the current pollId
            currentPollId = pollId;

            // Show the edit views modal
            document.getElementById('editViewsModal').classList.remove('hidden');
        }

        function closeEditViewsModal() {
            // Hide the edit views modal
            document.getElementById('editViewsModal').classList.add('hidden');
        }

        function saveEditedViews() {
            // Get the new views value from the input field
            const newViews = document.getElementById('viewsInput').value;

            // Make an AJAX request to update the views for the specified pollId
            fetch("{{ route('edit-poll-views') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': "{{ csrf_token() }}",
                },
                body: JSON.stringify({
                    pollId: currentPollId,
                    newViews: newViews,
                }),
            })
                .then(response => response.json())
                .then(result => {
                    console.log(currentPollId);
                    const viewsCell = document.querySelector(`#pollsTable tr[data-poll-id="${currentPollId}"] td:nth-child(4)`);
                    if (result.success) {
                        location.reload();
                        closeEditViewsModal();
                    } else {
                        console.error("Error updating poll views.");
                    }
                })
                .catch(error => {
                    console.error("Error updating poll views: ", error);
                });
        }
    </script>
</x-app-layout>
