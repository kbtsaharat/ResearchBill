<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <br>

    <div class="container">
        <!-- Button to open the modal -->
        <div class="flex justify-end mb-4">
            <!-- Use a link or button to redirect to the desired page -->
            <a href="{{ route('research') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add Project
            </a>
        </div>

        <table class="w-full bg-white border shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No.</th>
                    <th class="border px-4 py-2">Research Title</th>
                    <th class="border px-4 py-2">Start Date</th>
                    <th class="border px-4 py-2">End Date</th>
                    <th class="border px-4 py-2">Material</th>
                    <th class="border px-4 py-2">Equipment</th>
                </tr>
            </thead>
            <tbody>
                @php
                $fakeProjects = [
                [
                'research_title' => 'Exploring Renewable Energy Sources',
                'start_date' => '2023-01-15',
                'end_date' => '2023-12-31',
                'material' => '20000',
                'equipment' => '4000'
                ],
                [
                'research_title' => 'Advancements in Artificial Intelligence',
                'start_date' => '2023-03-10',
                'end_date' => '2023-11-30',
                'material' => '30000',
                'equipment' => '7000'
                ],
                [
                'research_title' => 'Sustainable Agriculture Techniques',
                'start_date' => '2023-02-20',
                'end_date' => '2023-10-15',
                'material' => '15000',
                'equipment' => '3500',
                ],
                [
                'research_title' => 'Urban Transportation Solutions',
                'start_date' => '2023-04-05',
                'end_date' => '2023-09-30',
                'material' => '18000',
                'equipment' => '5000',
                ],
                [
                'research_title' => 'Healthcare Innovation',
                'start_date' => '2023-06-10',
                'end_date' => '2023-12-15',
                'material' => '25000',
                'equipment' => '6000',
                ],
                [
                'research_title' => 'Environmental Pollution Control',
                'start_date' => '2023-03-15',
                'end_date' => '2023-11-20',
                'material' => '22000',
                'equipment' => '4500',
                ],
                [
                'research_title' => 'Space Exploration Technology',
                'start_date' => '2023-05-01',
                'end_date' => '2023-12-31',
                'material' => '28000',
                'equipment' => '5500',
                ],
                [
                'research_title' => 'Improving Water Quality',
                'start_date' => '2023-07-20',
                'end_date' => '2023-11-15',
                'material' => '16000',
                'equipment' => '3800',
                ],
                [
                'research_title' => 'Innovations in Renewable Materials',
                'start_date' => '2023-09-05',
                'end_date' => '2023-12-10',
                'material' => '19000',
                'equipment' => '4200',
                ],
                [
                'research_title' => 'Future of Telecommunications',
                'start_date' => '2023-08-10',
                'end_date' => '2023-12-31',
                'material' => '21000',
                'equipment' => '4800',
                ],
                [
                'research_title' => 'Advancing Cancer Research',
                'start_date' => '2023-07-01',
                'end_date' => '2023-11-30',
                'material' => '27000',
                'equipment' => '6000',
                ],
                [
                'research_title' => 'Smart City Innovations',
                'start_date' => '2023-10-15',
                'end_date' => '2023-12-31',
                'material' => '23000',
                'equipment' => '5200',
                ],

                // Add more fake projects as needed
                ];
                @endphp
                @foreach ($fakeProjects as $index => $project)
                <tr>
                    <td class="border px-4 py-2">{{ $index + 1 }}</td>
                    <td class="border px-4 py-2">{{ $project['research_title'] }}</td>
                    <td class="border px-4 py-2">{{ $project['start_date'] }}</td>
                    <td class="border px-4 py-2">{{ $project['end_date'] }}</td>
                    <td class="border px-4 py-2">{{ $project['material'] }}</td>
                    <td class="border px-4 py-2">{{ $project['equipment'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
</x-app-layout>