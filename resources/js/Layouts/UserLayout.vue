<template>
    <v-app id="inspire">
        <v-navigation-drawer app permanent>
            <v-row justify="center" class="mt-10">
                <v-img src="/assets/logo.jpeg" max-width="150"></v-img>
            </v-row>
            <v-row class="mt-10">
                <v-divider></v-divider>
            </v-row>
            <v-row justify="center" class="mt-7">
                <v-avatar color="teal" size="64">
                    <v-icon color="white" style="font-size:42px;"
                        >mdi-account</v-icon
                    >
                </v-avatar>
            </v-row>
            <v-row justify="center" class="mt-5">
                <span class="headline font-weight-bold text-capitalize">
                    Edward Macorini
                </span>
            </v-row>
            <!-- <inertia-link
                :href="route('sadmin-index')"
                style="text-decoration: none;"
            >
                <v-row class="mt-5">
                    <v-col cols="12" class="text-center">
                        <v-icon
                            style="font-size: 4em; border: none; text-decoration: none;"
                        >
                            mdi-earth
                        </v-icon>
                    </v-col>
                    <v-col
                        cols="12"
                        class="text-center subtitle-1 mt-n5 white--text"
                    >
                        Organizaciones
                    </v-col>
                </v-row>
            </inertia-link> -->
        </v-navigation-drawer>

        <v-app-bar app>
            <!-- <v-app-bar-nav-icon 
            @click="drawer = !drawer"></v-app-bar-nav-icon> -->

            <v-toolbar-title>Panel de administración Medicease</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn
                type="button"
                outlined
                color="blue darken-3"
                @click="logout()"
                >Cerrar Sesión</v-btn
            >
        </v-app-bar>
        <v-main>
            <slot></slot>
        </v-main>
    </v-app>
</template>

<script>
export default {
    props: {
        userData: Object,
        rolName: String,
        teamData: Object
    },
    methods: {
        logout() {
            this.$inertia.post(route("logout"));
            location.replace("/home");
        }
    }
};
</script>
