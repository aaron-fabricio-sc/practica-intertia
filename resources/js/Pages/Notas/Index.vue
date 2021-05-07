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
                                    Listado de notas
                                </h3>
                                <p class="text-sm text-gray-900">
                                    Toma el registro correcto y ejectuta
                                    cualquier función
                                </p>
                                p
                            </div>
                        </div>
                        <div class="md:col-span-2 mt-5 md:mt-0">
                            <div class="shadow bg-white md:rounded-md p-4">
                                <div class="flex justify-between">
                                    <input type="text" class="form-input rounded-md shadow" placeholder="Buscar..." v-model="q">

 <inertia-link class="text-white bg-blue-600 py-3 px-2 rounded-md" :href="route('notas.create')"> Crear una nota
                                </inertia-link>


                               
                                </div>
                               <hr class="mb-6">

                                <table>
                                    <tr v-for="nota in notas">
                                        <td class="border px-4 py-2"> 
                                            {{nota.excerpt}}
                                        </td>
                                        <td class=" px-4 py-2"> 
                                            <inertia-link :href="route('notas.show' ,nota.id )">
                                                Ver
                                             </inertia-link>
                                             
                                        </td>
                                        <td class=" px-4 py-2">
                                             <inertia-link :href="route('notas.edit' ,nota.id )">
                                                Editar
                                             </inertia-link>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Welcome from "@/Jetstream/Welcome";
import { watch } from '@vue/runtime-core';

export default {
    components: {
        AppLayout,
    },
    props:{
        notas:Array,
        },
        data(){
            return{
                q:'',
            }
        },
        watch:{
            q:function(value){
                this.$inertia.replace(this.route('notas.index' , {q:value}))
            }
        }
        ,
};
</script>
