<template>
    <form @submit.prevent="submit">
        <template>
            <default-layout>
                <v-container>
                    <v-row justify="center" align="center" class="wh-100">
                        <v-col cols="11" sm="8" md="5">
                            <v-card elevation="2" class="px-5 py-10">
                                <v-card-title>
                                    <v-img
                                        src="/assets/logo.jpeg"
                                        max-width="100"
                                    ></v-img>
                                    <h5 class="headline text--secondary pt-12">
                                        Iniciar Sesión
                                    </h5>
                                </v-card-title>
                                <v-card-text class="pt-5 px-10">
                                    <v-row>
                                        <v-text-field
                                            v-model="form.username"
                                            label="Nombre de usuario"
                                            name="username"
                                        ></v-text-field>
                                    </v-row>
                                    <v-row>
                                        <v-text-field
                                            v-model="form.password"
                                            name="password"
                                            :append-icon="
                                                show1
                                                    ? 'mdi-eye'
                                                    : 'mdi-eye-off'
                                            "
                                            :type="show1 ? 'text' : 'password'"
                                            @click:append="show1 = !show1"
                                            label="Contraseña"
                                        ></v-text-field>
                                    </v-row>
                                    <v-row justify="center" class="mt-10 px-10">
                                        <v-btn
                                            type="submit"
                                            block
                                            color="primary"
                                        >
                                            Iniciar Sesión
                                        </v-btn>
                                    </v-row>
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-container>
            </default-layout>
        </template>
    </form>
</template>

<script>
import DefaultLayout from "../../../Layouts/DefaultLayout.vue";

export default {
    props: {
        errors: Object
    },
    components: {
        DefaultLayout,
    },
    data() {
        return {
            show1: false,
            form: this.$inertia.form({
                username: "",
                password: ""
            })
        };
    },
    watch: {
        errors(errors) {
            if (errors) {
                this.$swal.fire({
                    icon: "error",
                    title: "Credenciales no validas",
                    text: "Por favor intente otra vez"
                });
            }
        }
    },
    methods: {
        submit() {
            this.form.post(this.route("login"), {
                onFinish: () => this.form.reset("password")
            });
        }
    }
};
</script>
