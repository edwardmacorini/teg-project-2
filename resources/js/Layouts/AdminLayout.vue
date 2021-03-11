<template>
    <v-app id="inspire">
        <v-navigation-drawer app dark permanent color="#0E0742">
            <v-row justify="center" class="mt-10">
                <v-avatar color="indigo" size="98">
                    <span class="white--text headline">EM</span>
                </v-avatar>
            </v-row>
            <v-row justify="center" class="mt-5">
                <span class="white--text headline text-capitalize">{{
                    userData.name
                }}</span>
            </v-row>
            <v-row justify="center">
                <span class="blue--text headline subtitle-2 text-capitalize">{{
                    rolName
                }}</span>
            </v-row>
            <v-row class="mt-5">
                <v-divider></v-divider>
            </v-row>
            <inertia-link
                :href="route('sadmin-index')"
                style="text-decoration: none;"
                v-if="userData.privileges == 'sadmin'"
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
            </inertia-link>

            <!--  -->
        </v-navigation-drawer>

        <v-app-bar app>
            <!-- <v-app-bar-nav-icon 
            @click="drawer = !drawer"></v-app-bar-nav-icon> -->

            <v-toolbar-title>Application</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn
                type="button"
                outlined
                color="blue darken-3"
                @click="logout()"
                >Cerrar Sesión</v-btn
            >
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
        rolName: String
    },
    methods: {
        logout() {
            this.$inertia.post(route("logout"));
        }
    }
};
</script>
