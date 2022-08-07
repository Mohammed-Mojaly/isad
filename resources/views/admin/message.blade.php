@if (Session::has('status'))
@if (Session::get('status') == true)
    <div class="p-4 mt-4 text-sm text-center text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
        role="alert">
        <span class="font-medium">Success alert!</span>  Successfully
    </div>
@else
    <div class="p-4 mt-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
        role="alert">
        <span class="font-medium">Danger alert!</span> Something was wrong
    </div>
@endif
@endif
