<template>
    <default-layout>
        <v-row justify="center" align="center">
            <v-card class="card-user-register">
                <v-card-title>Formulario de registro</v-card-title>
                <v-divider color="red"></v-divider>
                <v-card-text class="px-15">
                    <v-row>
                        <v-col>
                            <v-text-field
                                label="Nombres"
                                v-model="form.nombres"
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-text-field
                                label="Apellidos"
                                v-model="form.apellidos"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col cols="1">
                            <v-select
                                :items="items_tipoCedula"
                                v-model="form.tipoCedula"
                            ></v-select>
                        </v-col>
                        <v-col>
                            <v-text-field
                                label="Nro. Cedula"
                                v-model="form.cedula"
                                value="V"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-text-field
                                label="Nacionalidad"
                                v-model="form.Nacionalidad"
                                value="V"
                            ></v-text-field>
                        </v-col>
                        <v-col>
                            <v-menu
                                ref="menu"
                                v-model="menu"
                                :close-on-content-click="false"
                                :return-value.sync="form.fechaNacimiento"
                                transition="scale-transition"
                                offset-y
                                min-width="auto"
                            >
                                <template v-slot:activator="{ on, attrs }">
                                    <v-text-field
                                        v-model="form.fechaNacimiento"
                                        label="Fecha de nacimiento"
                                        preapend-icon="mdi-calendar"
                                        readonly
                                        v-bind="attrs"
                                        v-on="on"></v-text-field>
                                </template>
                                <v-date-picker
                                    v-model="form.fechaNacimiento"
                                    no-title
                                    scrollable></v-date-picker>
                            </v-menu>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-row><br>
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
            items_tipoCedula: ['V','E'],
            menu: false,
            form: {
                nombres: null,
                apellidos: null,
                tipoCedula: 'V',
                cedula: null,
                fechaNacimiento: new Date().toISOString().substr(0,10),
                nacionalidad

            }
        }
    }
};
</script>