<template>
    <admin-layout :userData="userData" rolName="Super Administrador">
        <v-card elevation="8" class="mx-15 mt-10 px-15 py-10 radio">
            <v-card-text>
                <v-row justify="space-between" align="center" class="mb-6">
                    <h2 class="black--text">
                        Crear nueva organización
                    </h2>
                    <v-switch
                        v-model="form.type"
                        label="Implementar sistema de censos"
                        color="success"
                        value="success"
                        hide-details
                    ></v-switch>
                </v-row>
                <form @submit.prevent="submit()" class="px-5">
                    <v-row>
                        <v-text-field
                            label="Nombre"
                            v-model="form.name"
                        ></v-text-field>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-text-field
                                label="RIF"
                                v-model="form.rif"
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                label="Licencia"
                                v-model="form.licence"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-text-field
                                label="Numero de telefono"
                                v-model="form.number"
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                label="Correo"
                                v-model="form.mail"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-textarea
                            label="Dirección"
                            v-model="form.address"
                        ></v-textarea>
                    </v-row>
                    <v-row justify="center">
                        <v-col cols="6">
                            <template>
                                <div class="text-center">
                                    <v-dialog v-model="dialog" max-width="700">
                                        <template
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-btn
                                                v-bind="attrs"
                                                v-on="on"
                                                color="primary"
                                                block
                                            >
                                                Crear
                                            </v-btn>
                                        </template>

                                        <v-card
                                            elevation="8"
                                            class="px-15 py-10 radio"
                                        >
                                            <v-card-title class="headline">
                                                Crear un usuario para completar
                                                el registro
                                            </v-card-title>

                                            <v-card-text>
                                                <v-text-field
                                                    label="Nombre"
                                                    v-model="form.userFullName"
                                                ></v-text-field>
                                            </v-card-text>

                                            <v-card-text>
                                                <v-text-field
                                                    label="Nombre de usuario"
                                                    v-model="form.username"
                                                ></v-text-field>
                                            </v-card-text>

                                            <v-card-text>
                                                <v-text-field
                                                    label="Correo"
                                                    v-model="form.email"
                                                ></v-text-field>
                                            </v-card-text>

                                            <v-card-text>
                                                <v-text-field
                                                    label="Contraseña"
                                                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                                    :type="show1 ? 'text' : 'password'"
                                                    @click:append="show1 = !show1"
                                                    v-model="form.password"
                                                ></v-text-field>
                                            </v-card-text>

                                            <v-card-text>
                                                <v-text-field
                                                    label="Confirmar Contraseña"
                                                    :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                                    :type="show2 ? 'text' : 'password'"
                                                    class="input-group--focused"
                                                    @click:append="show2 = !show2"
                                                    v-model="
                                                        form.password_confirmation
                                                    "
                                                ></v-text-field>
                                            </v-card-text>

                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn
                                                    color="red darken-1"
                                                    @click="dialog = false"
                                                    outlined
                                                >
                                                    Cancelar
                                                </v-btn>
                                                <v-btn
                                                    color="primary"
                                                    outlined
                                                    type="submit"
                                                    @click="submit"
                                                >
                                                    Completar
                                                </v-btn>
                                            </v-card-actions>
                                        </v-card>
                                    </v-dialog>
                                </div>
                            </template>
                        </v-col>
                    </v-row>
                </form>
            </v-card-text>
        </v-card>
    </admin-layout>
</template>
<script>
import AdminLayout from "../../../../Layouts/AdminLayout";

export default {
    props: {
        userData: Object,
        teams: Array,
        errors: Object
    },
    components: {
        AdminLayout
    },
    data() {
        return {
            show1: false,
            show2: false,
            dialog: false,
            form: this.$inertia.form({
                name: null,
                rif: null,
                address: null,
                number: null,
                mail: null,
                licence: null,
                type: null,
                userFullName: null,
                username: null,
                email: null,
                password: null,
                password_confirmation: "",
                privileges: "oadmin"
            }),
            dialog2: false
        };
    },
    watch: {
        errors(errors) {
            if (errors) {
                this.$swal.fire({
                    icon: "error",
                    title: "Información inválida",
                    text: "Por favor corrija la informacion e intente otra vez"
                });
            }
        }
    },
    methods: {
        submit() {
            this.form.post(this.route("sadmin.orgs.store"), {
                onFinish: () => {
                    this.form.reset("password", "password_confirmation")
                }
            });
        },
    },
};
</script>
