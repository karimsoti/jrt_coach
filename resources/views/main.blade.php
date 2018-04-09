@extends('layouts.welcome')

@section('content')
<div class="contact1 ">
    <div class="container-contact1">
        <div class="contact1-pic js-tilt" data-tilt>
            <img src="images/img-01.png" alt="IMG">
        </div>

        <form class="contact1-form validate-form" method="post" action="{{route('submit_feedback')}}">

            {{csrf_field()}}
            <span class="contact1-form-title">
                Coaching Feedback
            </span>


            <!--                    <div class="wrap-input1 validate-input" data-validate = "Name is required">
                                    <input class="input1" type="text" name="agent" placeholder="Agent">
                                    <span class="shadow-input1"></span>
                                </div>-->

            <select name="agent" class="wrap-input1 input1" >
                <option value="0" >Agent</option>

                @foreach($agent as $agents)

                <option value="{{$agents->id}}">{{$agents->name}}</option>

                @endforeach 
            </select>


            <div class="wrap-input1 validate-input" data-validate = "Name is required" >
                <input class="input1" type="text" name="jiraNumber" placeholder="JIRA Number" required> 
                <span class="shadow-input1"></span>
            </div>

            <div class="wrap-input1 validate-input" data-validate = "Name is required"  >
                <!--<input class="input1" type="text" name="jiraStatus" placeholder="JIRA Status">-->
                <select name="jiraStatus" class="wrap-input1 input1" required>
                    <option value="none">Jira Status</option>
                    <option value="Draft">Draft</option>
                    <option value="Inspection Queue">Inspection Queue</option>
                    <option value="Inspect Blocked">Inspect Blocked</option>
                    <option value="Triage">Triage</option>
                    <option value="Plan">Plan</option>
                    <option value="Plan Queue">Plan Queue</option>
                </select>

                <span class="shadow-input1"></span>
            </div>
            <div class="wrap-input1 validate-input" data-validate = "Name is required" >

                <select name="jiraReason" class="wrap-input1 input1" required>
                    <option value="none">Reason for Blocking</option>
                    <option value="Lack of knowledge">Lack of knowledge</option>
                    <option value="Did not provide enough logs">Did not provide enough logs</option>
                    <option value="Not enough troubleshooting">Not enough troubleshooting</option>
                    <option value="Issue is not a bug">Issue is not a bug</option>

                </select>
                <span class="shadow-input1"></span>
            </div>
            <!--            <div class="wrap-input1 validate-input" data-validate = "Name is required">
                            <input class="input1" type="text" name="jiraReason" placeholder="Reason for Blocking">
                            <span class="shadow-input1"></span>
                        </div>-->

            <!--            <div class="wrap-input1 validate-input" data-validate = "Name is required">
                            <input class="input1" type="text" name="region" placeholder="Region">
                            <span class="shadow-input1"></span>
                        </div>-->

            <div class="wrap-input1 validate-input" data-validate = "Name is required">
                <textarea class="input1"  name="jrtFeedback" placeholder="JRT Feedback"></textarea>
                <span class="shadow-input1"></span>
            </div>

            <!--                    <div class="wrap-input1 validate-input" data-validate = "Message is required">
                                    <textarea class="input1" name="message" placeholder="Message"></textarea>
                                    <span class="shadow-input1"></span>
                                </div>-->

            <div class="container-contact1-form-btn">
                <input type="submit" class="contact1-form-btn">
                <span>

                            <!--<i class="fa fa-long-arrow-right" aria-hidden="true"></i>-->
                </span>

            </div>  
        </form>
    </div>
</div>

@endsection 