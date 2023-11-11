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

                    <table  id="pollsTable" class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Question</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Options</th>
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
    
                        const actionsCell = document.createElement("td");
    
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
                        row.appendChild(actionsCell);
    
                        // Append the row to the table body
                        tbody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error("Error fetching data: ", error);
                });
        });
    </script>
    
</x-app-layout>
