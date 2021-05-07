<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de notas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg text-gray-900">
                                    Detalle de una nota
                                </h3>
                                <p class="text-sm text-gray-900 font-bold">
                                {{nota.excerpt}}
                                </p>
                                
                            </div>
                        </div>
                        <div class="md:col-span-2 mt-5 md:mt-0">
                            <div class="shadow bg-white md:rounded-md p-4">
                               <p>{{nota.content}}</p>
                               <hr class="my-6">

                               <inertia-link :href="route('notas.index')">
                                   Volver
                                </inertia-link>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <a href="#" @click.prevent="destroy" class="bg-red-600 text-white font-bold py-3 px-2 my-4 rounded-md">Eliminar nota</a>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";

export default {
    components: {
        AppLayout,
    },
    props:{
        nota:Object,
        },
    methods:{
        destroy(){
            if(confirm('Desea eliminar??')){
                this.$inertia.delete(this.route('notas.destroy',this.nota.id))
            }
        }
    }
};
</script>
