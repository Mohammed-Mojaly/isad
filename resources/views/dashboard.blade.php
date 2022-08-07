<x-app-layout>

    <div class="justify-center align-items-center text-center" style="left: 50%;top: 50%;position: absolute;transform: translate(-50%, -50%);">

        <ul class="w-80 text-xl  font-medium text-gray-900 bg-white rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600"><a href="{{ route('user.update_primary_data') }}">Update the primary data</a></li>
            <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600"><a href="{{ route('user.update_housing_info') }}">Update housing info</a></li>
            <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600"><a href="{{ route('profile.show') }}">Profile</a></li>

        </ul>
    </div>

</x-app-layout>
