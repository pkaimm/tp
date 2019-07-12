@extends('layouts.index')
@section('title','后台首页')
@section('body')
   <div class="rightmain" id="rightmain">
      <div class="rightcontent">
         <form action="">
            @csrf
            <table>
               <tr>
                  <td><h1>后台首页</h1></td>
               </tr>
            </table>
         </form>
      </div>
   </div>
@endsection