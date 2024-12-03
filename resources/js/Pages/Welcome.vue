<script setup lang="ts">
import { Head, Link } from "@inertiajs/vue3";
import heroImg from "../../assets/heroImage.jpeg";
import SearchBar from "@/Components/SearchBar.vue";
import locationMapIcon from "../../assets/location.svg";
import chipIcon from "../../assets/chip.svg";
import goIcon from "../../assets/goIcon.svg";
import phoneIcon from "../../assets/phone.svg";
import userCoverageIcon from "../../assets/usercoverage.svg";
import carImage from "../../assets/carImagebgrmoved.png";
import HowItWorks from "@/Components/HowItWorks.vue";
import Testimonials from "@/Components/Testimonials.vue";
import Faq from "@/Components/Faq.vue";

import {
    Carousel,
    CarouselContent,
    CarouselItem,
    CarouselNext,
    CarouselPrevious,
} from "@/Components/ui/carousel";

import categoryImage from "../../assets/categoryImage.jpeg";

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();
</script>

<template>
    <Head title="Welcome" />

    <main class="">
        <section class="hero_section">
            <div class="wrapper flex justify-between w-full">
                <div
                    class="column bg-customPrimaryColor h-[65vh] w-full text-white flex flex-col items-end justify-center"
                >
                    <div class="w-[666px]">
                        <h1>Hit the Road with the Perfect Ride</h1>
                        <p class="text-[1.25rem] mt-3">
                            Get a car wherever and whenever you need it <br />
                            with your iOS or Android device.
                        </p>
                    </div>
                </div>
                <div class="column h-[80vh] w-full relative">
                    <img
                        class="rounded-bl-[20px] h-full w-full"
                        :src="heroImg"
                        alt=""
                    />
                    <div
                        class="bg-customOverlayColor absolute top-0 w-full h-full rounded-bl-[20px]"
                    ></div>
                </div>
            </div>
        </section>

        <section class="mt-[-14rem]">
            <div class="container">
                <SearchBar />
            </div>
        </section>

        <section
            class="category-carousel mt-[8rem] min-h-[50vh] py-customVerticalSpacing overflow-x-hidden"
        >
            <div
                class="flex min-h-[inherit] items-center justify-between gap-24 max-w-[1700px] ml-auto mr-[-100px]"
            >
                <div class="column">
                    <h2>
                        Our <br />
                        Categories
                    </h2>
                </div>
                <div
                    class="column carousel rounded-[20px] p-6"
                    style="
                        background: linear-gradient(
                            90deg,
                            rgba(21, 59, 79, 0.2) 0%,
                            rgba(21, 59, 79, 0) 94.4%
                        );
                    "
                >
                    <Carousel
                        class="relative w-full"
                        :opts="{
                            align: 'start',
                        }"
                    >
                        <CarouselContent>
                            <CarouselItem
                                v-for="(_, index) in 5"
                                :key="index"
                                class="md:basis-1/2 lg:basis-1/3"
                            >
                                <div class="p-1">
                                    <Link href="">
                                        <Card>
                                            <CardContent
                                                class="cardContent flex h-[415px] items-center justify-center p-6 relative"
                                            >
                                                <img
                                                    class="rounded-[20px] h-full w-full object-cover"
                                                    :src="categoryImage"
                                                    alt=""
                                                />

                                                <div
                                                    class="category_name absolute bottom-10 left-0 flex justify-between w-full px-8"
                                                >
                                                    <span
                                                        class="text-white text-[2rem] font-semibold"
                                                        >Sports</span
                                                    >
                                                    <img
                                                        class=""
                                                        :src="goIcon"
                                                        alt=""
                                                    />
                                                </div>
                                            </CardContent>
                                        </Card>
                                    </Link>
                                </div>
                            </CarouselItem>
                        </CarouselContent>
                        <CarouselPrevious />
                        <CarouselNext />
                    </Carousel>
                </div>
            </div>
        </section>

        <!------------------------------- WHY CHOOSE US -------------------------------------->
        <!------------------------------ <Start>  -------------------------------------------------->
        <section class="py-customVerticalSpacing">
            <div class="container flex flex-col gap-16">
                <div class="column text-center flex flex-col items-center">
                    <span class="text-[1.25rem]">-Why Choose Us-</span>
                    <h3 class="max-w-[883px]">
                        From luxury sedans to budget-friendly compacts, we've
                        got something for every journey
                    </h3>
                </div>
                <div class="column grid grid-cols-3 gap-16">
                    <div class="col flex flex-col gap-10">
                        <div class="info-card flex gap-5 items-start">
                            <img :src="locationMapIcon" alt="" />
                            <div
                                class="text-customMediumBlackColor flex flex-col gap-3"
                            >
                                <span class="text-[1.5rem] font-medium"
                                    >Convenient Locations</span
                                >
                                <p>
                                    With multiple rental locations at airports,
                                    city centers, and popular destinations,
                                    picking up and dropping off your rental is
                                    quick and easy.
                                </p>
                            </div>
                        </div>
                        <div class="info-card flex gap-5 items-start">
                            <img :src="phoneIcon" alt="" />
                            <div
                                class="text-customMediumBlackColor flex flex-col gap-3"
                            >
                                <span class="text-[1.5rem] font-medium"
                                    >Fast and Easy Booking Process</span
                                >
                                <p>
                                    Select your desired pickup and return dates,
                                    along with the time.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <img
                            class="rounded-[20px] h-full w-full object-cover"
                            :src="carImage"
                            alt=""
                        />
                    </div>
                    <div class="col flex flex-col gap-10">
                        <div class="info-card flex gap-5 items-start">
                            <img :src="chipIcon" alt="" />
                            <div
                                class="text-customMediumBlackColor flex flex-col gap-3"
                            >
                                <span class="text-[1.5rem] font-medium"
                                    >Modern Fleet with the Latest
                                    Technology</span
                                >
                                <p>
                                    Select your desired pickup and return dates,
                                    along with the time.
                                </p>
                            </div>
                        </div>
                        <div class="info-card flex gap-5 items-start">
                            <img :src="userCoverageIcon" alt="" />
                            <div
                                class="flex flex-col gap-3 text-customMediumBlackColor"
                            >
                                <span class="text-[1.5rem] font-medium"
                                    >Insurance Coverage</span
                                >
                                <p>
                                    Select your desired pickup and return dates,
                                    along with the time.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!------------------------------ <End>  -------------------------------------------------->

        <!-- ------------------------How It Works Section-------------------------------- -->
        <!------------------------------ <Start>  -------------------------------------------------->
        <section class="py-customVerticalSpacing">
            <HowItWorks />
        </section>
        <!-- ---------------------------<End>---------------------------------------------------->

        <!-- ------------------------Testimonials Section-------------------------------- -->
        <!------------------------------ <Start>  -------------------------------------------------->
        <section class="py-customVerticalSpacing">
            <Testimonials />
        </section>
        <!-- ---------------------------<End>---------------------------------------------------->

        <!-- ------------------------FAQ Section-------------------------------- -->
        <!------------------------------ <Start>  -------------------------------------------------->
        <section class="my-customVerticalSpacing">
            <Faq />
        </section>
        <!-- ---------------------------<End>---------------------------------------------------->
    </main>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}

.carousel .cardContent {
    padding: 0rem;
}
.category-carousel .next-btn {
    right: 15% !important;
}
</style>
