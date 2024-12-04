<script setup lang="ts">
import { ref } from 'vue'
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Button } from '@/Components/ui/button'
import { 
  Stepper, 
  StepperItem, 
  StepperTrigger, 
  StepperSeparator, 
  StepperTitle, 
  StepperDescription 
} from '@/Components/ui/stepper'
import { Check, Circle, Dot } from 'lucide-vue-next'

const stepIndex = ref(1)
const steps = [
  {
    step: 1,
    title: 'Personal Details',
    description: 'First & Last Name'
  },
  {
    step: 2,
    title: 'Contact Information',
    description: 'Phone & Email'
  },
  {
    step: 3,
    title: 'Address Details',
    description: 'Location Information'
  },
  {
    step: 4,
    title: 'Account Setup',
    description: 'Create Password'
  }
]

const form = useForm({
  first_name: '',
  last_name: '',
  date_of_birth: '',
  phone_number: '',
  email: '',
  address: '',
  postcode: '',
  city: '',
  country: '',
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post(route('register'), {
    onFinish: () => {
      form.reset('password', 'password_confirmation');
    },
  });
};
</script>

<template>

    <main>
    <div class="container py-customVerticalSpacing">

    
    <Head title="Register" />
    
    <Stepper v-slot="{ isNextDisabled, isPrevDisabled, nextStep, prevStep }" v-model="stepIndex" class="block w-full">
      <form @submit.prevent="submit">
        <div class="flex w-full flex-start gap-2">
          <StepperItem
            v-for="step in steps"
            :key="step.step"
            v-slot="{ state }"
            class="relative flex w-full flex-col items-center justify-center"
            :step="step.step"
          >
            <StepperSeparator
              v-if="step.step !== steps[steps.length - 1].step"
              class="absolute left-[calc(50%+20px)] right-[calc(-50%+10px)] top-5 block h-0.5 shrink-0 rounded-full bg-muted group-data-[state=completed]:bg-primary"
            />

            <StepperTrigger as-child>
              <Button
                :variant="state === 'completed' || state === 'active' ? 'default' : 'outline'"
                size="icon"
                class="z-10 rounded-full shrink-0"
                :class="[state === 'active' && 'ring-2 ring-ring ring-offset-2 ring-offset-background']"
              >
                <Check v-if="state === 'completed'" class="size-5" />
                <Circle v-if="state === 'active'" />
                <Dot v-if="state === 'inactive'" />
              </Button>
            </StepperTrigger>

            <div class="mt-5 flex flex-col items-center text-center">
              <StepperTitle
                :class="[state === 'active' && 'text-primary']"
                class="text-sm font-semibold transition lg:text-base"
              >
                {{ step.title }}
              </StepperTitle>
              <StepperDescription
                :class="[state === 'active' && 'text-primary']"
                class="sr-only text-xs text-muted-foreground transition md:not-sr-only lg:text-sm"
              >
                {{ step.description }}
              </StepperDescription>
            </div>
          </StepperItem>
        </div>

        <div class="flex flex-col gap-4 w-[40rem] mx-auto mt-[4rem] sign_up">
          <!-- Personal Details Step -->
          <template v-if="stepIndex === 1">
            <div class="grid grid-cols-2 gap-5">
            <div>
              <InputLabel for="first_name" value="First Name" />
              <TextInput
                id="first_name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.first_name"
                required
                autofocus
              />
              <InputError class="mt-2" :message="form.errors.first_name" />
            </div>

            <div class="">
              <InputLabel for="last_name" value="Last Name" />
              <TextInput
                id="last_name"
                type="text"
                class="mt-1 block w-full"
                v-model="form.last_name"
                required
              />
              <InputError class="mt-2" :message="form.errors.last_name" />
            </div>

            <div class="col-span-2">
              <InputLabel for="date_of_birth" value="Date of Birth" />
              <TextInput
                id="date_of_birth"
                type="date"
                class="mt-1 block w-full"
                v-model="form.date_of_birth"
                required
              />
              <InputError class="mt-2" :message="form.errors.date_of_birth" />
            </div>
        </div>
          </template>

          <!-- Contact Information Step -->
          <template v-if="stepIndex === 2"> 
            <div class="grid grid-cols-1 gap-5">
            <div>
              <InputLabel for="phone_number" value="Phone Number" />
              <TextInput
                id="phone_number"
                type="tel"
                class="mt-1 block w-full"
                v-model="form.phone_number"
                required
              />
              <InputError class="mt-2" :message="form.errors.phone_number" />
            </div>

            <div class="mt-4">
              <InputLabel for="email" value="Email" />
              <TextInput
                id="email"
                type="email"
                class="mt-1 block w-full"
                v-model="form.email"
                required
                autocomplete="username"
              />
              <InputError class="mt-2" :message="form.errors.email" />
            </div>
        </div>
          </template>

          <!-- Address Details Step -->
          <template v-if="stepIndex === 3">
            <div class="grid grid-cols-1 gap-5">
            <div>
              <InputLabel for="address" value="Address" />
              <TextInput
                id="address"
                type="text"
                class="mt-1 block w-full"
                v-model="form.address"
                required
              />
              <InputError class="mt-2" :message="form.errors.address" />
            </div>

            <div class="flex gap-4">
                <div class="mt-4 w-full">
              <InputLabel for="postcode" value="Postcode" />
              <TextInput
                id="postcode"
                type="text"
                class="mt-1 block w-full"
                v-model="form.postcode"
                required
              />
              <InputError class="mt-2" :message="form.errors.postcode" />
            </div>

            <div class="mt-4 w-full">
              <InputLabel for="city" value="City" />
              <TextInput
                id="city"
                type="text"
                class="mt-1 block w-full"
                v-model="form.city"
                required
              />
              <InputError class="mt-2" :message="form.errors.city" />
            </div>
            </div>

            <div class="mt-4">
              <InputLabel for="country" value="Country" />
              <TextInput
                id="country"
                type="text"
                class="mt-1 block w-full"
                v-model="form.country"
                required
              />
              <InputError class="mt-2" :message="form.errors.country" />
            </div>
        </div>
          </template>

          <!-- Account Setup Step -->
          <template v-if="stepIndex === 4">
            <div class="grid grid-cols-1 gap-5">
            <div>
              <InputLabel for="password" value="Password" />
              <TextInput
                id="password"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password"
                required
                autocomplete="new-password"
              />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
              <InputLabel for="password_confirmation" value="Confirm Password" />
              <TextInput
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                v-model="form.password_confirmation"
                required
                autocomplete="new-password"
              />
              <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <Link
                :href="route('login')"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Already registered?
              </Link>
            </div>
            </div>
          </template>

          <div class="flex items-center justify-between mt-4">
          <Button :disabled="isPrevDisabled" variant="outline" size="sm" @click="prevStep()">
            Back
          </Button>
          <div class="flex items-center gap-3">
            <Button 
              v-if="stepIndex !== 4" 
              type="button" 
              size="sm" 
              @click="nextStep()"
              :disabled="isNextDisabled"
            >
              Next
            </Button>
            <PrimaryButton 
              v-if="stepIndex === 4" 
              class="ms-4" 
              :class="{ 'opacity-25': form.processing }" 
              :disabled="form.processing"
            >
              Register
            </PrimaryButton>
          </div>
        </div>
        </div>

        
      </form>
    </Stepper>
</div>    
</main>
</template>

<style>
.sign_up input{
    border: 1px solid #2B2B2B80;
    border-radius: 12px;
    padding: 0.75rem;
}
.sign_up label{
    color:#2B2B2BBF;
}
</style>
