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
                <template v-slot:item.id="{ item }" class="text-center">
                    <v-btn text color="success" @click="openDialog(item.id)">
                        <v-icon>mdi-clipboard-arrow-up</v-icon>
                    </v-btn>
                </template>
                <template v-slot:no-data>
                    No poseé ninguna organización disponible
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
                    Resumen de beneficiado Nº
                </v-card-title>

                <v-card-text>
                    <v-row>
                        <v-col
                            >Nombre completo.
                            <span class="text-capitalize"></span
                        ></v-col>
                    </v-row>
                    <v-row>
                        <v-col>CI. </v-col>
                        <v-col>
                            Fecha de nacimiento.
                        </v-col>
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
        {{ items }}
    </admin-layout>
</template>

<script>
import AdminLayout from "../../../../Layouts/AdminLayout";

export default {
    props: {
        userData: Object,
        teamData: Object,
        beneficiados: Array,
        census: Array,
        antecedentes: Array,
        discapacidades: Array
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
                    value: "beneficiado.nombre"
                },
                {
                    text: "Cedula",
                    align: "center",
                    sortable: true,
                    value: "beneficiado.cedula"
                },
                {
                    text: "Nacionalidad",
                    align: "center",
                    sortable: true,
                    value: "beneficiado.nacionalidad"
                },
                {
                    text: "Razon social",
                    align: "center",
                    sortable: true,
                    value: "descripcion"
                },
                {
                    text: "Resumen",
                    align: "center",
                    sortable: true,
                    value: "id"
                }
            ],
            items: [],
            beneficiado: {
                id: null,
                nombre: null,
                tipoCedula: null,
                cedula: null,
                fechaNacimiento: null,
                nacionalidad: null,
                sexo: null,
                estadoCivil: null,
                profesion: null,
                ocupacion: null,
                cantidadFamilia: null,
                cantidadHijos: null,
                tipoVivienda: null,
                propiedad: null,
                direccion: null,
                situacion_economica: null,
                antecedentes_salud: null,
                discapacitado: null
            },
            antecedente: {
                tipo_sangre: null,
                cond_especiales: null,
                antecedentes: null
            },
            discapacidad: {
                si_no: null,
                descripcion: null
            }
        };
    },
    mounted: function() {
        this.census.forEach(element => {
            this.getBeneficiado(element.user_id);
            this.items.push({
                censusId: element.id,
                descripcion: element.descripcion,
                beneficiado: {
                    id: this.beneficiado.id,
                    nombre: this.beneficiado.nombre,
                    tipoCedula: this.beneficiado.tipoCedula,
                    cedula: this.beneficiado.cedula,
                    fechaNacimiento: this.beneficiado.fechaNacimiento,
                    nacionalidad: this.beneficiado.nacionalidad,
                    sexo: this.beneficiado.sexo,
                    estadoCivil: this.beneficiado.estadoCivil,
                    profesion: this.beneficiado.profesion,
                    ocupacion: this.beneficiado.ocupacion,
                    cantidadFamilia: this.beneficiado.cantidadFamilia,
                    cantidadHijos: this.beneficiado.cantidadHijos,
                    tipoVivienda: this.beneficiado.tipoVivienda,
                    propiedad: this.beneficiado.propiedad,
                    direccion: this.beneficiado.direccion,
                    situacion_economica: this.beneficiado.situacion_economica,
                    antecedentes_salud: {
                        tipo_sangre: this.antecedente.tipo_sangre,
                        cond_especiales: this.antecedente.cond_especiales,
                        antecedentes: this.antecedente.antecedentes
                    },
                    discapacitado: {
                        si_no: this.discapacidad.si_no,
                        descripcion: this.discapacidad.descripcion
                    }
                }
            });
        });
    },
    methods: {
        openDialog(id) {
            this.dialogShow = true;
        },
        getBeneficiado(id) {
            this.beneficiados.forEach(element => {
                if (element.user_id == id) {
                    this.beneficiado = null;
                    this.discapacidad = null;
                    this.antecedente = null;
                    this.beneficiado = {
                        id: element.id,
                        nombre: element.nombre,
                        tipoCedula: element.tipoCedula,
                        cedula: element.cedula,
                        fechaNacimiento: element.fechaNacimiento,
                        nacionalidad: element.nacionalidad,
                        sexo: element.sexo,
                        estadoCivil: element.estadoCivil,
                        profesion: element.profesion,
                        ocupacion: element.ocupacion,
                        cantidadFamilia: element.cantidadFamilia,
                        cantidadHijos: element.cantidadHijos,
                        tipoVivienda: element.tipoVivienda,
                        propiedad: element.propiedad,
                        direccion: element.direccion,
                        situacion_economica: element.situacion_economica,
                        antecedentes_salud: this.getAntecedentes(
                            element.antecedentes_salud
                        ),
                        discapacitado: this.getDiscapacidad(
                            element.discapacitado
                        )
                    };
                }
            });
        },
        getAntecedentes(id) {
            this.antecedentes.forEach(element => {
                if (element.id == id) {
                    this.discapacidad = {
                        si_no: element.si_no,
                        descripcion: element.descripcion
                    };
                }
            });
        },
        getDiscapacidad(id) {
            this.discapacidades.forEach(element => {
                if (element.id == id) {
                    this.antecedente = {
                        tipo_sangre: element.tipo_sangre,
                        cond_especiales: element.cond_especiales,
                        antecedentes: element.antecedente
                    };
                }
            });
        }
    }
};
</script>
