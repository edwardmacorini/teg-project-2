<template>
    <default-layout>
        <v-row justify="center" align="center" style="height: 100vh;">
            <v-stepper v-model="e1" class="card-user-register">
                <v-card-title>Formulario de registro</v-card-title>
                <v-divider color="red"></v-divider>
                <v-stepper-header>
                    <v-stepper-step :complete="e1 > 1" step="1">
                        Informacion personal
                    </v-stepper-step>
                    <v-divider></v-divider>
                    <v-stepper-step :complete="e1 > 2" step="2">
                        Informacion personal
                    </v-stepper-step>
                    <v-divider></v-divider>
                    <v-stepper-step step="3">
                        Antecedentes de salud
                    </v-stepper-step>
                </v-stepper-header>
                <v-stepper-items>
                    <v-stepper-content step="1">
                        <v-card class="mb-3 card-user-stepper">
                            <v-card-text class="px-7">
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
                                    <v-col>
                                        <v-select
                                            label="Sexo"
                                            :items="items_sexo"
                                            v-model="form.sexo"
                                        ></v-select>
                                    </v-col>
                                    <v-col>
                                        <v-select
                                            label="Estado Civil"
                                            :items="items_estadoCivil"
                                            v-model="form.estadoCivil"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col>
                                        <v-text-field
                                            label="Nacionalidad"
                                            v-model="form.nacionalidad"
                                            value="V"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col>
                                        <v-menu
                                            ref="menu"
                                            v-model="menu"
                                            :close-on-content-click="true"
                                            :return-value.sync="
                                                form.fechaNacimiento
                                            "
                                            transition="scale-transition"
                                            offset-y
                                            min-width="auto"
                                        >
                                            <template
                                                v-slot:activator="{ on, attrs }"
                                            >
                                                <v-text-field
                                                    v-model="
                                                        form.fechaNacimiento
                                                    "
                                                    label="Fecha de nacimiento"
                                                    preapend-icon="mdi-calendar"
                                                    readonly
                                                    v-bind="attrs"
                                                    v-on="on"
                                                ></v-text-field>
                                            </template>
                                            <v-date-picker
                                                v-model="form.fechaNacimiento"
                                                no-title
                                                scrollable
                                            ></v-date-picker>
                                        </v-menu>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                        </v-card>
                        <v-btn color="primary" @click="e1 = 2">Siguiente</v-btn>
                    </v-stepper-content>
                    <v-stepper-content step="2">
                        <v-card class="mb-3 card-user-stepper">
                            <v-card-text class="px-7">
                                <v-row>
                                    <v-col>
                                        <v-text-field
                                            label="Profesión"
                                            v-model="form.profesion"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col>
                                        <v-text-field
                                            label="Ocupación"
                                            v-model="form.ocupacion"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col>
                                        <v-select
                                            label="Situación Economica"
                                            :items="items_situacionEconomica"
                                            v-model="form.situacionEconomica"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col>
                                        <v-text-field
                                            label="Cantidad de grupo familiar"
                                            v-model="form.numFamilia"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col>
                                        <v-text-field
                                            label="Cantidad de hijos"
                                            v-model="form.numHijos"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col>
                                        <v-text-field
                                            label="Tipo de vivienda"
                                            v-model="form.tipoVivienda"
                                        ></v-text-field>
                                    </v-col>
                                    <v-col>
                                        <v-text-field
                                            label="Cantidad de hijos"
                                            v-model="form.numHijos"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                        </v-card>
                        <v-btn color="error" @click="e1 = 1">Atras</v-btn>
                        <v-btn color="primary" @click="e1 = 3">Siguiente</v-btn>
                    </v-stepper-content>
                    <v-stepper-content step="3">
                        <v-card class="mb-3 card-user-stepper">
                            <v-card-text class="px-7"> </v-card-text>
                        </v-card>
                        <v-btn color="error" @click="e1 = 2">Atras</v-btn>
                        <v-btn color="success">Completar registro</v-btn>
                    </v-stepper-content>
                </v-stepper-items>
            </v-stepper>
            <!--  -->
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
            items_tipoCedula: ["V", "E"],
            items_sexo: ["Masculino", "Femenino"],
            items_situacionEconomica: [],
            menu: false,
            e1: 1,
            form: {
                nombres: null,
                apellidos: null,
                tipoCedula: "V",
                cedula: null,
                fechaNacimiento: new Date().toISOString().substr(0, 10),
                nacionalidad: null,
                sexo: "Masculino",
                profesion: null,
                ocupacion: null,
                situacionEconomica: null
            }
        };
    }
};
</script>
