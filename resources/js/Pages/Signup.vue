<script setup lang="ts">
import { Button } from "@/Components/ui/button";
import {
    Form,
    FormControl,
    FormField,
    FormItem,
    FormLabel,
    FormMessage,
} from "@/Components/ui/form";
import { Input } from "@/Components/ui/input";
import {
    Stepper,
    StepperItem,
    StepperSeparator,
    StepperTitle,
    StepperTrigger,
} from "@/Components/ui/stepper";
import { toast } from "@/Components/ui/toast";
import { toTypedSchema } from "@vee-validate/zod";
import { Check, Circle, Dot } from "lucide-vue-next";
import { h, ref } from "vue";
import * as z from "zod";

const formSchema = [
    z.object({
        firstName: z.string(),
        lastName: z.string(),
    }),

    z.object({
        phoneNumber: z.string(),
        email: z.string().email(),
    }),

    z.object({
        address: z.string(),
        postcode: z.number(),
        city: z.string(),
        // country: z.union([z.literal('Germany'), z.literal('Dubai'), z.literal('India')]),
    }),

    z.object({
            password: z.string().min(2).max(50),
            confirmPassword: z.string(),
        })
        .refine(
            (values) => {
                return values.password === values.confirmPassword;
            },
            {
                message: "Passwords must match!",
                path: ["confirmPassword"],
            }
        ),
];

const stepIndex = ref(1);
const steps = [
    {
        step: 1,
        title: "Personal Information",
    },
    {
        step: 2,
        title: "Contact Details",
    },
    {
        step: 3,
        title: "Address",
    },
    {
        step: 4,
        title: "Create Password",
    },
];

function onSubmit(values: any) {
    toast({
        title: "You submitted the following values:",
        description: h(
            "pre",
            { class: "mt-2 w-[340px] rounded-md bg-slate-950 p-4" },
            h("code", { class: "text-white" }, JSON.stringify(values, null, 2))
        ),
    });
}
</script>

<template>
    <Head title="Sign Up" />

     <main class="">
    <section class="sign_up container min-h-[85vh] py-customVerticalSpacing">
        <Form
            v-slot="{ meta, values, validate }"
            as=""
            keep-values
            :validation-schema="toTypedSchema(formSchema[stepIndex - 1])"
        >
            <Stepper
                v-slot="{ isNextDisabled, isPrevDisabled, nextStep, prevStep }"
                v-model="stepIndex"
                class="block w-full"
            >
                <form
                    @submit="
                        (e) => {
                            e.preventDefault();
                            validate();

                            if (stepIndex === steps.length && meta.valid) {
                                onSubmit(values);
                            }
                        }
                    "
                >
                    <div class="flex w-full flex-start gap-2">
                        <StepperItem
                            v-for="step in steps"
                            :key="step.step"
                            v-slot="{ state }"
                            class="relative flex w-full flex-col items-center justify-center"
                            :step="step.step"
                        >
                            <StepperSeparator
                                v-if="
                                    step.step !== steps[steps.length - 1].step
                                "
                                class="absolute left-[calc(50%+20px)] right-[calc(-50%+10px)] top-5 block h-0.5 shrink-0 rounded-full bg-muted group-data-[state=completed]:bg-primary"
                            />

                            <StepperTrigger as-child>
                                <Button
                                    :variant="
                                        state === 'completed' ||
                                        state === 'active'
                                            ? 'default'
                                            : 'outline'
                                    "
                                    size="icon"
                                    class="z-10 rounded-full shrink-0"
                                    :class="[
                                        state === 'active' &&
                                            'ring-2 ring-ring ring-offset-2 ring-offset-background',
                                    ]"
                                    :disabled="
                                        state !== 'completed' && !meta.valid
                                    "
                                >
                                    <Check
                                        v-if="state === 'completed'"
                                        class="size-5"
                                    />
                                    <Circle v-if="state === 'active'" />
                                    <Dot v-if="state === 'inactive'" />
                                </Button>
                            </StepperTrigger>

                            <div
                                class="mt-5 flex flex-col items-center text-center"
                            >
                                <StepperTitle
                                    :class="[
                                        state === 'active' && 'text-primary',
                                    ]"
                                    class="text-sm font-semibold transition lg:text-base"
                                >
                                    {{ step.title }}
                                </StepperTitle>
                            </div>
                        </StepperItem>
                    </div>

                    <div class="flex flex-col gap-4 mt-4">
                        <template v-if="stepIndex === 1">
                            <div
                                class="text-center py-customVerticalSpacing mt-[3rem] flex flex-col justify-center items-center gap-10"
                            >
                                <div
                                    class="column flex flex-col justify-center items-center"
                                >
                                    <h3>Personal Information</h3>
                                    <p>
                                        To get started, tell us about yourself.
                                    </p>
                                </div>
                                <div
                                    class="column grid grid-cols-2 gap-10 w-[800px]"
                                >
                                    <FormField
                                        v-slot="{ componentField }"
                                        name="firstName"
                                    >
                                        <FormItem class="text-left">
                                            <FormLabel>First Name</FormLabel>
                                            <FormControl>
                                                <Input
                                                    type="text"
                                                    v-bind="componentField"
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    </FormField>

                                    <FormField
                                        v-slot="{ componentField }"
                                        name="lastName"
                                    >
                                        <FormItem class="text-left">
                                            <FormLabel>Last Name</FormLabel>
                                            <FormControl>
                                                <Input
                                                    type="text"
                                                    v-bind="componentField"
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    </FormField>
                                </div>
                            </div>
                        </template>

                        <template v-if="stepIndex === 2">
                            <div
                                class="text-center py-customVerticalSpacing mt-[3rem] flex flex-col justify-center items-center gap-10"
                            >
                                <div
                                    class="column flex flex-col justify-center items-center"
                                >
                                    <h3>Contact Details</h3>
                                    <p>
                                        We'll send you relevant info about your
                                        bookings.
                                    </p>
                                </div>
                                <div
                                    class="column flex flex-col gap-10 w-[800px]"
                                >
                                    <FormField
                                        v-slot="{ componentField }"
                                        name="phoneNumber"
                                    >
                                        <FormItem class="text-left">
                                            <FormLabel>Phone Number</FormLabel>
                                            <FormControl>
                                                <Input
                                                    type="text"
                                                    v-bind="componentField"
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    </FormField>

                                    <FormField
                                        v-slot="{ componentField }"
                                        name="email"
                                    >
                                        <FormItem class="text-left">
                                            <FormLabel>Email Address</FormLabel>
                                            <FormControl>
                                                <Input
                                                    type="text"
                                                    v-bind="componentField"
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    </FormField>
                                    <label class="custom-checkbox">
                                        <input
                                            type="checkbox"
                                            id="same-location"
                                        />
                                        <span class="checkmark"></span>
                                        I consent to receive news and special
                                        offers from Europcar International.
                                    </label>
                                </div>
                            </div>
                        </template>

                        <template v-if="stepIndex === 3">
                            <div
                                class="text-center py-customVerticalSpacing mt-[3rem] flex flex-col justify-center items-center gap-10"
                            >
                                <div
                                    class="column flex flex-col justify-center items-center"
                                >
                                    <h3>Address</h3>
                                    <p>We'll use it for billing purposes</p>
                                </div>
                                <div
                                    class="column flex flex-col gap-10 w-[800px]"
                                >
                                    <FormField
                                        v-slot="{ componentField }"
                                        name="address"
                                    >
                                        <FormItem class="text-left">
                                            <FormLabel>Address</FormLabel>
                                            <FormControl>
                                                <Input
                                                    type="text"
                                                    v-bind="componentField"
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    </FormField>

                                    <FormField
                                        v-slot="{ componentField }"
                                        name="postcode"
                                    >
                                        <FormItem class="text-left">
                                            <FormLabel>Post Code</FormLabel>
                                            <FormControl>
                                                <Input
                                                    type="number"
                                                    v-bind="componentField"
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    </FormField>

                                    <FormField
                                        v-slot="{ componentField }"
                                        name="city"
                                    >
                                        <FormItem class="text-left">
                                            <FormLabel>City</FormLabel>
                                            <FormControl>
                                                <Input
                                                    type="text"
                                                    v-bind="componentField"
                                                />
                                            </FormControl>
                                            <FormMessage />
                                        </FormItem>
                                    </FormField>

                                    
                                </div>
                            </div>
                        </template>

                        <template v-if="stepIndex === 4">

                            <div
                                class="text-center py-customVerticalSpacing mt-[3rem] flex flex-col justify-center items-center gap-10"
                            >
                                <div
                                    class="column flex flex-col justify-center items-center"
                                >
                                    <h3>Create Password</h3>
                                    <p>We'll use it for billing purposes</p>
                                </div>
                                <div
                                    class="column flex flex-col gap-10 w-[800px]"
                                >
                            <FormField
                                v-slot="{ componentField }"
                                name="password"
                            >
                                <FormItem class="text-left">
                                    <FormLabel>Password</FormLabel>
                                    <FormControl>
                                        <Input
                                            type="password"
                                            v-bind="componentField"
                                        />
                                    </FormControl>
                                    <FormMessage />
                                </FormItem>
                            </FormField>

                            <FormField
                                v-slot="{ componentField }"
                                name="confirmPassword"
                            >
                                <FormItem class="text-left">
                                    <FormLabel>Confirm Password</FormLabel>
                                    <FormControl>
                                        <Input
                                            type="password"
                                            v-bind="componentField"
                                        />
                                    </FormControl>
                                    <FormMessage />
                                </FormItem>
                            </FormField>
                            </div>
                            </div>
                        </template>
                    </div>

                    <div
                        class="flex items-center justify-between mt-4 w-[800px] mx-auto"
                    >
                        <Button
                            :disabled="isPrevDisabled"
                            variant="outline"
                            size="lg"
                            @click="prevStep()"
                        >
                            Back
                        </Button>
                        <div class="flex items-center gap-3">
                            <Button
                                v-if="stepIndex !== 4"
                                :type="meta.valid ? 'button' : 'submit'"
                                :disabled="isNextDisabled"
                                size="lg"
                                @click="meta.valid && nextStep()"
                            >
                                Next
                            </Button>
                            <Button
                                v-if="stepIndex === 4"
                                size="lg"
                                type="submit"
                            >
                                Submit
                            </Button>
                        </div>
                    </div>
                </form>
            </Stepper>
        </Form>
    </section>
</main>
</template>


<style>
.sign_up input{
    border: 1px solid #2B2B2B80;
    border-radius: 12px;
}
.sign_up label{
    color:#2B2B2BBF;
}
</style>