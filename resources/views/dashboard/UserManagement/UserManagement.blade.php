<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for superadmin') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200 ">
                

                    <table id="UserMTable" class="table">
                       <thead>
                            <tr>
                                <th>NO</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                       </thead>
                       <tbody>

                       </tbody>
                    </table>
                    
                    @include('dashboard.UserManagement.UserMmodal')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>