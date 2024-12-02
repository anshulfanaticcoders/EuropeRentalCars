<script setup lang="ts">
import { Button } from '@/Components/ui/button';
import menuIcon from '../../assets/hamburger.svg';
import ApplicationLogo from "./ApplicationLogo.vue";
import { Link } from "@inertiajs/vue3";
import {
  Sheet,
  SheetClose,
  SheetContent,
  SheetDescription,
  SheetFooter,
  SheetHeader,
  SheetTitle,
  SheetTrigger,
} from '@/Components/ui/sheet'
</script>

<template>
  <Sheet>
    <SheetTrigger as-child>
      <Button variant="outline" class="border-0">
        <img :src= menuIcon alt="">
      </Button>
    </SheetTrigger>
    <SheetContent>
      <SheetHeader>
        <SheetTitle>
          <Link href="/" class="column w-full">
           <ApplicationLogo/>
         </Link>
        </SheetTitle>
        <SheetDescription>
          <ul>
            <li>
              <Link href="">Create Listing</Link>
            </li>
            <li>
              <Link href="">About Us</Link>
            </li>
            <li>
              <Link href="">Blogs</Link>
            </li>
            <li>
              <Link href="/login">Log in</Link>
            </li>
          </ul>
        </SheetDescription>
      </SheetHeader>
    </SheetContent>
  </Sheet>
</template>