<template>
    <admin-layout
        :userData="userData"
        :rolName="
            userData.privileges == 'oadmin' ? 'Administrador' : 'Empleado'
        "
        :teamData="teamData"
    >
        <v-card elevation="8" class="mx-10 mt-5 px-5 py-10 radio">
            <h2>Listado de solicitudes</h2>
            <!-- <v-row justify="space-between" align="center">
                <v-col cols="5">
                    <v-text-field
                        label="Buscar organización o usuario"
                        v-model="search"
                        append-icon="mdi-manigfy"
                        single-line
                        hide-details
                    ></v-text-field>
                </v-col>
                <v-col cols="auto">
                    <inertia-link
                        :href="route('sadmin.orgs.create')"
                        class="txnode"
                    >
                        <v-btn outlined color="blue darken-3" class="mr-5">
                            Nueva organización
                        </v-btn>
                    </inertia-link>
                </v-col>
            </v-row> -->
            <v-data-table
                :headers="headers"
                :items="items"
                :items-per-page="5"
                class="elavation-1 mt-5"
            >
                <template v-slot:item.resumen="{ item }" class="text-center">
                    <v-btn
                        text
                        color="success"
                        @click="openDialog(item.resumen)"
                    >
                        <v-icon>mdi-clipboard-arrow-up</v-icon>
                    </v-btn>
                </template>
            </v-data-table>
        </v-card>
        <v-dialog
            v-model="dialogShow"
            :overlay="true"
            max-width="500px"
            transition="dialog-transition"
        >
            <v-card>
                <v-card-title class="headline">
                    Resumen de beneficiado Nº{{ resumen.id }}
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col
                            >Nombre completo.
                            <span class="text-capitalize">{{
                                resumen.nombre
                            }}</span></v-col
                        >
                    </v-row>
                    <v-row>
                        <v-col
                            >CI. {{ resumen.tipoCedula }}-{{ resumen.cedula }}
                        </v-col>
                        <v-col
                            >Fecha de nacimiento.
                            {{ resumen.fechaNacimiento }}</v-col
                        >
                    </v-row>
                </v-card-text>

                <v-divider></v-divider>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="primary" text @click="dialogShow = false">
                        I accept
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </admin-layout>
</template>

<script>
import AdminLayout from "../../../../Layouts/AdminLayout";

export default {
    props: {
        userData: Object,
        teamData: Object,
        beneficiados: Array,
        census: Array
    },
    components: {
        AdminLayout
    },
    data() {
        return {
            dialogShow: false,
            headers: [
                {
                    text: "Beneficiado",
                    align: "center",
                    sortable: true,
                    value: "nombre"
                },
                {
                    text: "Cedula",
                    align: "center",
                    sortable: true,
                    value: "cedula"
                },
                {
                    text: "Nacionalidad",
                    align: "center",
                    sortable: true,
                    value: "nacionalidad"
                },
                {
                    text: "Tipo de beneficio",
                    align: "center",
                    sortable: true,
                    value: "tipo_beneficio"
                },
                {
                    text: "Resumen",
                    align: "center",
                    sortable: true,
                    value: "resumen"
                }
            ],
            items: [],
            beneficiado: []
        };
    },
    mounted: function() {
        this.census.forEach(element => {
            this.items.push({
                id: element.id,
                descripcion: element.descripcion,
                beneficiado: getBeneficiado()
            });
        });
    },
    methods: {
        openDialog(id) {
            this.dialogShow = true;
        },
        getBeneficiado(id) {
            this.beneficiados.forEach(element => {
                if(element.id == id) {
                    this.beneficiado.id = element.id;
                    this.beneficiado.nombre = element.nombre;
                    this.beneficiado.tipoCedula = element.tipoCedula;
                    this.beneficiado.cedula = element.cedula;
                    this.beneficiado.fechaNacimiento = element.fechaNacimiento;
                    this.beneficiado.nacionalidad = element.nacionalidad;
                    this.beneficiado.sexo = element.sexo;
                    this.beneficiado.estadoCivil = element.estadoCivil;
                    this.beneficiado.profesion = element.profesion;
                    this.beneficiado.ocupacion = element.ocupacion;
                    this.beneficiado.cantidadFamilia = element.cantidadFamilia;
                    this.beneficiado.cantidadHijos = element.cantidadHijos;
                    this.beneficiado.tipoVivienda = element.tipoVivienda;
                    this.beneficiado.propiedad = element.propiedad;
                    this.beneficiado.direccion  = element.direccion ;
                    this.beneficiado.situacion_economica = element.situacion_economica;
                    this.beneficiado.antecedentes_salud  = element.antecedentes_salud;
                    this.beneficiado.discapacitado  = element.discapacitado;
                }
            })
        }
    }
};
</script>
