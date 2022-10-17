<script src="./guestLayout.js"></script>
<template>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <NavLink :active="route().current('login')" :href="route('login')">Log in</NavLink>
            <NavLink :active="route().current('register')" :href="route('register')">Register</NavLink>
        </div>
    </header>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <slot />
        </div>
    </div>
</template>
