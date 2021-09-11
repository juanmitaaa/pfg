<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"> {{ __('tickets') }} </h2>
  </x-slot>
  <div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
        <div>
          <div class="grid grid-cols-1 gap-4">             
            <div class="flex flex-col  border-2 rounded p-3 bg-white">
              <div class="font-semibold text-xl tracking-tight border-b">
                <h3>{{__('Tickets')}} <span class="float-right"><a  href="{{ route('dashboard') }}" class="text-indigo-700"> {{ __('Dashboard') }}</a> > {{ __('Tickets') }} </span></h3>
              </div>
              <div class="py-5">
                {!! link_to_route('tickets.create', __('Add ticket'),null,['class'=>'bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded']) !!}
              </div>
              
              <table class="table table-bordered" id="listado-tickets" style="max-width: 100% !important; width: 100% !important">
                <thead>
                  <tr>
                    <th>{{__('Ticket number')}}</th>
                    <th>{{__('Seller')}}</th>
                    <th>{{__('Cash register')}}</th>
                    <th>{{__('Number lines')}}</th>
                    <th>{{__('Purchase at')}}</th>                    
                    <th>{{__('Created at')}}</th>
                    <th>{{__('Updated at')}}</th>                    
                    <th>{{__('Actions')}}</th>
                  </tr>
                </thead>
                <tbody>                
                @foreach($tickets as $i=>$ticket)
                <tr>
                  <td> {!! link_to_route('tickets.show', $ticket->number,['ticket'=>$ticket]) !!}</td>
                  <td>{{$ticket->seller}}</td>                   
                  <td>{{$ticket->caja}} </td>
                  <td>{{$ticket->ticketLines->count()}} </td>
                  <td>{{!empty($ticket->purchase_at)?$ticket->purchase_at:""}}</td>
                  <td>{{!empty($ticket->created_at)?$ticket->created_at:""}}</td>
                  <td>{{!empty($ticket->updated_at)?$ticket->updated_at:""}}</td>
                                
                  <td> <a href="{{route('tickets.edit',['ticket'=>$ticket])}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded editar mr-2">  <x-icon name="pencil" class="h-4 w-4 inline"/>
                    </a>
                    @if($ticket->ticketLines->count() == 0)
                    <button value="{{$ticket->id}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded destroy" data-ticket="{{$ticket->id}}"> <x-icon name="trash" class="h-4 w-4 inline"/>
                    </button> @endif </td>
                </tr>
                @endforeach
                </tbody>
                
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{ asset('js/ticket.js') }}"></script>
</x-app-layout>