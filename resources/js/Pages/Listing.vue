<script setup lang="ts">
import CarCard from '@/Components/CarCard.vue';
import FilterSlot from '@/Components/ListingPageComponents/FilterSlot.vue';
import SearchBar from '@/Components/SearchBar.vue';
import { Head } from '@inertiajs/vue3';


</script>

<template>
   <Head title="Listing" />
    
   <main>
       
       <section class="bg-customPrimaryColor py-[2rem]">
            <div class="container py-customVerticalSpacing">
             <SearchBar class="border-[2px] rounded-[20px] border-white"/>
            </div>
        </section>

        
        <section>
            <div class="container filters">
            <div class="column">
                <FilterSlot/>
            </div>
            </div>
        </section>


        <section>
            <div class="container py-customVerticalSpacing">
                
                <CarCard/>
            </div>
        </section>


        
   </main>
</template>

<style>

</style>