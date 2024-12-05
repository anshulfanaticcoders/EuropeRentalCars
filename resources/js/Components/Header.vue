<script setup lang="ts">

import { Link } from "@inertiajs/vue3";
import ApplicationLogo from "./ApplicationLogo.vue";
import OffcanvasMenu from "./OffcanvasMenu.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>

<template>

<header class="bg-white car_header fixed w-full z-50 top-0">
    <div class="container w-full mx-auto flex justify-between items-center py-10 gap-10">
    <Link href="/" class="column">
        <ApplicationLogo/>
    </Link>

    <div class="column flex items-center gap-4">
        <Link href="register">
            <button class="button-secondary py-3 px-5">
                Create an account
            </button>
        </Link>
        <OffcanvasMenu/>
    </div>
    </div>

</header>
</template>

<style>
.car_header{
    box-shadow: 0px 12px 10px -15px #153b4f3d;   
}
</style>