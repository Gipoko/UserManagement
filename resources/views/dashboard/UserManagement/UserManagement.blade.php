<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Dashboard for superadmin') }}</h2>
    </x-slot>
  
    <div class="bg-white shadow-md rounded-lg p-4 mx-4 mt-8 sm:mx-auto sm:w-3/4 md:w-1/2 lg:w-1/3">

    <button type="button" id="NewUser" class="btn btn-secondary btn-sm mb-4">New User</button>


        <div class="table-responsive">
    <table id="UserMTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">NO</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Add table row content here -->
        </tbody>
    </table>
</div>



        @include('dashboard.UserManagement.UserMmodal')
    </div>
</x-app-layout>
