<template>
    <form @submit.prevent="submit">
        <template>
            <jet-validation-errors class="mb-4" />
            <default-layout>
                <v-container>
                    <v-row justify="center" align="center" class="wh-100">
                        <v-col cols="12" sm="9" md="6">
                            <v-card elevation="2" class="px-5 py-10">
                                <v-card-title>
                                    <h5 class="headline text--secondary">
                                        Registrar Super Administrador
                                    </h5>
                                </v-card-title>
                                <v-card-text class="px-md-8 pb-md-8">
                                    <v-row>
                                        <v-col>
                                            <v-text-field
                                                v-model="form.name"
                                                label="Nombre"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col>
                                            <v-text-field
                                                v-model="form.last_name"
                                                label="Apellido"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-text-field
                                            v-model="form.username"
                                            label="Nombre de usuario"
                                            prepend-icon="mdi-account"
                                        ></v-text-field>
                                    </v-row>
                                    <v-row>
                                        <v-text-field
                                            v-model="form.email"
                                            label="Correo"
                                            prepend-icon="mdi-email"
                                        ></v-text-field>
                                    </v-row>
                                    <v-row>
                                        <v-text-field
                                            v-model="form.password"
                                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                            :type="show1 ? 'text' : 'password'"
                                            @click:append="show1 = !show1"
                                            label="Contraseña"
                                            prepend-icon="mdi-lock"
                                        ></v-text-field>
                                    </v-row>
                                    <v-row>
                                        <v-text-field
                                            v-model="form.password_confirmation"
                                            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                            :type="show2 ? 'text' : 'password'"
                                            @click:append="show2 = !show2"
                                            label="Confirmar contraseña"
                                            prepend-icon="mdi-lock"
                                        ></v-text-field>
                                    </v-row>
                                    <v-row justify="center" class="mt-10">
                                        <v-btn
                                            type="submit"
                                            block
                                            color="primary"
                                        >
                                            Registrar
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
import JetValidationErrors from "../../../Jetstream/ValidationErrors";

export default {
    components: {
        DefaultLayout,
        JetValidationErrors
    },
    data() {
        return {
            show1: false,
            show2: false,
            form: this.$inertia.form({
                name: "",
                last_name: "",
                username: "",
                email: "",
                password: "",
                password_confirmation: "",
                team_id: "",
                privileges: "sadmin"
            })
        };
    },
    methods: {
        submit() {
            this.form.post(this.route("register"), {
                onFinish: () =>
                    this.form.reset("password", "password_confirmation")
            });
        }
    }
};
</script>
