<x-base-layout>
    {{-- {{ theme()->getView('pages/account/_navbar', array('class' => 'mb-5 mb-xl-10', 'info' => $info)) }} --}}

    {{ theme()->getView('pages/account/settings/_profile-details', array('class' => 'mb-5 mb-xl-10','user' => $user, 'info' => $info)) }}

    @if($user === auth()->user())
    {{ theme()->getView('pages/account/settings/_signin-method', array('class' => 'mb-5 mb-xl-10', 'user' => $user, 'info' => $info)) }}
    @endif

</x-base-layout>
