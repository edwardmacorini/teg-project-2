<template>
    <default-layout>
        <v-row justify="center" align="center" style="height: 100vh;">
            <v-col md="6">
                <v-card elevation="8">
                    <v-card-text>
                        <v-row
                            justify="center"
                            align="center"
                            class="text-center"
                        >
                            <v-col cols="auto">
                                <v-img
                                    src="/assets/logo.jpeg"
                                    max-width="200"
                                ></v-img>
                                <h2 class="mt-3">INICIO DE SESIÓN</h2>
                            </v-col>
                        </v-row>
                        <v-row justify="center" align="center">
                            <v-col md="10">
                                <form @submit.prevent="submit">
                                    <v-card-text>
                                        <v-row>
                                            <v-text-field
                                                v-model="form.username"
                                                outlined
                                                label="Nombre de usuario"
                                                name="username"
                                            ></v-text-field>
                                        </v-row>
                                        <v-row>
                                            <v-text-field
                                                v-model="form.password"
                                                name="password"
                                                outlined
                                                :append-icon="
                                                    show1
                                                        ? 'mdi-eye'
                                                        : 'mdi-eye-off'
                                                "
                                                :type="
                                                    show1 ? 'text' : 'password'
                                                "
                                                @click:append="show1 = !show1"
                                                label="Contraseña"
                                            ></v-text-field>
                                        </v-row>
                                        <v-row
                                            justify="center"
                                            class="mt-5 mb-10 px-15"
                                        >
                                            <v-btn
                                                type="submit"
                                                block
                                                color="primary"
                                            >
                                                Iniciar Sesión
                                            </v-btn>
                                            <v-btn
                                                text
                                                color="info"
                                                class="mt-3"
                                            >
                                                Recuperar Contraseña
                                            </v-btn>
                                        </v-row>
                                    </v-card-text>
                                </form>
                            </v-col>
                        </v-row>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </default-layout>
</template>

<script>
import DefaultLayout from "../../../Layouts/DefaultLayout";

export default {
    components: {
        DefaultLayout
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
    methods: {
        submit() {
            this.form.post(this.route("login"), {
                onFinish: () => this.form.reset("password")
            });
        }
    }
};
</script>