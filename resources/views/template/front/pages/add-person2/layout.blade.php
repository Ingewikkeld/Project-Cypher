<script type="text/ng-template" id="addPerson.html">
    <div class="well bs-component">
        <div ng-if="!added" class="">
            <legend>Added new</legend>

            --

            <br/>
            <br/>
        </div>

        <form class="form-horizontal" ng-submit="ctrl.login()">
            <fieldset>
                <legend>To add</legend>
                <div class="form-group">
                    <label for="inputName" class="col-lg-2 control-label">Name</label>

                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Favorite</label>

                    <div class="col-lg-10">
                        {{--<input type="password" class="form-control" id="inputPassword" placeholder="Password">--}}

                        {{--<div class="checkbox">--}}
                        {{--<label>--}}
                        {{--<input type="checkbox"> Checkbox--}}
                        {{--</label>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                        <div class="togglebutton">
                            <label>
                                <input type="checkbox">
                            </label>
                        </div>
                    </div>
                </div>
                {{--<div class="form-group">--}}
                {{--<label for="inputFile" class="col-lg-2 control-label">File</label>--}}

                {{--<div class="col-lg-10">--}}
                {{--<input type="text" readonly="" class="form-control floating-label" placeholder="Browse...">--}}
                {{--<input type="file" id="inputFile" multiple="">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--<label for="textArea" class="col-lg-2 control-label">Textarea</label>--}}

                {{--<div class="col-lg-10">--}}
                {{--<textarea class="form-control" rows="3" id="textArea"></textarea>--}}
                {{--<span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                {{--<label class="col-lg-2 control-label">Radios</label>--}}

                {{--<div class="col-lg-10">--}}
                {{--<div class="radio radio-primary">--}}
                {{--<label>--}}
                {{--<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">--}}
                {{--Option one is this--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--<div class="radio radio-primary">--}}
                {{--<label>--}}
                {{--<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">--}}
                {{--Option two can be something else--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Rating</label>

                    <div class="col-lg-10">
                        <select class="form-control" id="select">
                            <option selected="selected">Not yet rated</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                        {{--<br>--}}
                        {{--<select multiple="" class="form-control">--}}
                        {{--<option>1</option>--}}
                        {{--<option>2</option>--}}
                        {{--<option>3</option>--}}
                        {{--<option>4</option>--}}
                        {{--<option>5</option>--}}
                        {{--</select>--}}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</script>