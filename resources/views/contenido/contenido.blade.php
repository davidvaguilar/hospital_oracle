@extends('principal')
@section('contenido')
 
 <template v-if="menu==0">
 <example-component></example-component>
 </template>

 <template v-if="menu==1">
   <h1>contenido 1</h1>
 </template>

 <template v-if="menu==2">
   <h1>contenido 2</h1>
 </template>

 <template v-if="menu==3">
   <h1>contenido 3</h1>
 </template>

 <template v-if="menu==4">
   <h1>contenido 4</h1>
 </template>

  <template v-if="menu==5">
   <h1>contenido 5</h1>
 </template>

 <template v-if="menu==6">
   <h1>contenido 6</h1>
 </template>

 <template v-if="menu==7">
   <h1>contenido 7</h1>
 </template>

 <template v-if="menu==8">
   <h1>contenido 8</h1>
 </template>





@endsection