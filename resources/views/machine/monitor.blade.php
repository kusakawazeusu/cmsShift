@extends ('machine.frame')

@section('EventSection')
  EventSection
@stop

@section('NavtiveBar')
    <li class="active"><a href= "{{ url('machinemonitor') }}">機台監控</a></li>
@stop

@section('script')
<script>
  function PlayMusic(){
    var audio = new Audio('audio/Warning_Sound1.mp3');
    audio.play();
  }
</script>
@stop

@section('MachineStatus')
<button onclick = "PlayMusic()"">
play!!
</button>
      <div class="well">
        <fieldset>

        @for ($bank = 1; $bank <= $MachineBankMax; ++$bank)
          <legend><h2>Bank {{$bank}}</h2></legend>
            <div class="row">
                @for ($i = 1; $i <= $MachineSeqMax; $i++)
                  <div class="col-lg-1">
                    <div class="well">
                      <legend class="text-center">{{$i}}</legend>
                        <div class="text-center">
                          <a href="#">
                          @if($MachineCounts >= ($bank-1)*$MachineSeqMax+$i)
                            @if ($MachineStatues[($bank-1)*$MachineSeqMax+$i] === 0)
                              <img src="img/machine/offline.png" width="100%">
                            @elseif ($MachineStatues[($bank-1)*$MachineSeqMax+$i] === 1)
                              <img src="img/machine/online.png" width="100%">
                            @elseif ($MachineStatues[($bank-1)*$MachineSeqMax+$i] === 2)
                              <img src="img/machine/event.png" width="100%">
                            @endif
                          @else
                              <img src="img/machine/event.png" width="1%">
                          @endif
                          </a>
                        </div>
                    </div>
                  </div>
                @endfor
            </div>
        @endfor

        </fieldset>
      </div>
@stop

@section('ControlSection')
  ControlerBar
@stop