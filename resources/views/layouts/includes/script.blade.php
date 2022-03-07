<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/plugins/apexchart/dsh-apaxcharts.js') }}"></script> -->

<!-- <script src="{{ asset('assets/plugins/simple-calendar/jquery.simple-calendar.js') }}"></script> -->
<!-- <script src="{{ asset('assets/js/calander.js') }}"></script> -->
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('select').selectpicker();
        $('table').DataTable();
        // createCenterAutocomplete();
        saveAsDraft();

        if( location.pathname.indexOf( '/centre/create') !== -1
            || location.pathname.indexOf( 'naissance/registre/create') !== -1
            || /naissance\/registre\/[0-9]+\/edit/.test( window.location.pathname))
            filterHierarchy( createDropdown);

        // if( location.pathname.indexOf( 'create-user') !== -1 || location.pathname.indexOf( 'edit-user') !== -1)
        //     filterHierarchy( createMultipleSelectDropdown);

        annotateRequired();
        judgementChange();

        function createCenterAutocomplete() {
            if( window.location.pathname !== "/centre/create" )
                return;

            const rules = JSON.parse( $( '[data-conn]').attr( 'data-conn'));
            const rank = rules.length > 0 ? Object.keys( rules[ 0]) : [];
            const order = Object.values( rank);
            const placeholders = $( '.bootstrap-select');
            const targets = $( '.bootstrap-select select[name]').get().map( function ( target, index) {
                const key = $( target).attr( 'name');
                rank.splice( rank.indexOf( key), 1, { [ key]: placeholders.get( index) });
                return target;
            });

            $( targets).on( 'change', function () {
                const dropdown_sel = '.filter-option-inner-inner';
                const pin = $( this).attr( 'name');
                const filter = this.selectedOptions[ 0].label;
                const guide  = rules.filter( function ( rule) {
                    return Object.values( rule).indexOf( filter) !== -1;
                });

                if( guide.length > 0)
                {
                    placeholders.find( dropdown_sel).get( 0).textContent = '--';
                    for ( let i = order.indexOf( pin); i < order.length; ++i)
                    {
                        const optionLabel = guide[ 0][ order[ i]];
                        const matchItem = rank.find( item => item[ order[ i]] != null);
                        if( matchItem == null)
                            continue;

                        const key = matchItem[ order[ i]];
                        $( key).find( 'select[name]').val( optionLabel);
                        $( key).find( dropdown_sel).get( 0).textContent = optionLabel;
                    }
                }
            });
        }

        function setupDraft() {
            const kit = JSON.parse( $( '[data-tool]').attr( 'data-tool'));
            act( kit, retrieveData);
        }

        function saveAsDraft() {
            let edit = false;

            if( !( edit = /naissance\/registre\/[0-9]+\/edit/.test( window.location.pathname)) &&  window.location.pathname.indexOf( 'naissance/registre/create') === -1)
                return;

            if( edit) {
                const kit = JSON.parse( $( '[data-tool]').attr( 'data-tool'));
                act( kit, retrieveData);
                $( 'div.modifiable').find( 'select').change();
            }

            $( '#draft').on( 'click', function () {

                act( {}, saveData);
            });
        }

        function saveData( el, present, type, isLast) {
            let main = type === 'div' ? $( el).find( 'select') : el;
            present[ $( main).attr( 'id')] = $( el).val();
            if( isLast)
            {
                if( Object.values( present).filter( each => each !== '').length > 0)
                {
                    present[ 'src'] = 'ajax';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax( {
                        url: $('#form').get( 0).action,
                        type: 'POST',
                        dataType: 'json',
                        data: present,
                        success: function ( message) {
                            // console.log( 'response: ', message);
                        },
                        error: function ( response) {
                            if( response.status === 200)
                                toastr.success( response.responseText, "Success");
                        }
                    });
                }
            }
        }

        function retrieveData( el, present, type) {
            if( type === 'div')
            {
                const main = $( el).find( 'select');
                const id = main.attr( 'id');
                if( present[ id] == null || present[ id] === '')
                    return;

                const selected = Array.from( main.children()).filter( each => each.value === present[ id]);
                if( selected.length === 0)
                    return;

                main.val( present[ id]);
                $( el).find( '.filter-option-inner-inner').get( 0).textContent = selected[ 0].innerHTML;
            }
            else
            {
                const id = $( el).attr( 'id');
                if( present[ id] == null || present[ id] === '')
                    return;

                $( el).val( present[ id]);
            }
        }

        function act( present, trigger) {
            const tag = $( '.serializable');
            tag.each( function( index) {
                trigger( this, present, this.nodeName.toLowerCase(), index + 1 === tag.length);
            });
        }

        function filterHierarchy( dropdownCreator) {
            const maybeAbsent = $( '[data-conn]').attr( 'data-conn');
            const kit = maybeAbsent == null ? {} : JSON.parse( maybeAbsent);
            const tag = $( 'div.modifiable');
            const routes = Object.keys( kit);
            console.log( kit);
            tag.each( function( index, each) {
                const nodeID = this.nodeName.toLowerCase();
                const parent = $( each);
                const mainEl = parent.find( 'select');

                mainEl.on( 'change', function () {
                    onSelectionChanged( mainEl, parent, kit, routes, dropdownCreator);
                });
            });
        }

        function onSelectionChanged( mainEl, parent, kit, routes, dropdownCreator) {
            dispatchChange( mainEl.get( 0), parent, kit, routes, dropdownCreator);
        }

        function dispatchChange( owner, parent, kit, routes, dropdownCreator) {
            const originalName = $( owner).attr( 'data-name');
            const ownerName = originalName.replace( /\[]/, '');
            let optionID = $( owner).val();
            if( optionID === 0)
                return;

            let optionsID = Array.isArray(  optionID) ? optionID.map( id => parseInt( id)) : [ parseInt( optionID)];
            for ( let index = routes.indexOf( ownerName); index < routes.length - 1; ++index)
            {
                const currentName = routes[ index];
                const nextName = routes[ index + 1];
                const next = kit[ nextName];
                const nextFiller = next.filter( function ( each) {
                    const currentKey =  currentName.slice( 0, -1) + '_' + 'id';
                    return optionsID.indexOf( each[ currentKey]) !== -1;
                });

                console.log( nextName, optionsID);

                optionsID = nextFiller.map( each => each.id);
                const dropdown = dropdownCreator(  $( `.modifiable [data-name*="${nextName}"]`), nextFiller);
                dropdown?.on( 'change', function () {
                    onSelectionChanged( $( this), parent, kit, routes, dropdownCreator);
                });
            }

            $.fn.stash = function ( query) {
                this.lastQuery = query;
                return query;
            }

            const common = function ( left, right) {
                const leftIDs = Object.keys( left);
                const rightIDs = Object.keys( right);
                return leftIDs.filter( each => rightIDs.includes( each));
            }

            const isEqualCommon = function ( left, right) {
                const commonProps = common( left, right);
                return commonProps.reduce( function ( prev, prop) {
                    return prev && left[ prop] === right[ prop];
                }, true);
            }

            const filled = $.fn.stash( $( 'div.modifiable')).find( '.filter-option-inner-inner')
                .slice( 1).get().map( function ( each, index) {
                    const parent = $( each).lastQuery.slice( 1).get( index);
                    const propName = $(parent).find( 'select').attr( 'data-name');

                    return { [propName]: $( each).text()};
                }).reduce( function( prev, current) {
                    return { ...prev, ...current};
                }, {});

            const lastName = routes[ routes.length - 1];
            const lastField =  $(`div.serializable [data-name=${ lastName}]`);
            const lastFieldMatch = kit[ lastName].filter( each => isEqualCommon( each, filled));

            console.log( 'lastFieldMatch', lastFieldMatch);

            createDropdown( lastField, lastFieldMatch.length === 0 ?  [] : lastFieldMatch);

            // [ lastFieldMatch[ 0]].forEach( each => console.log( each));
            // const optionLabel = lastFieldMatch[ 0][ 'description'];
            // lastField.val( optionLabel);
            // const element = lastField.parent().find( '.filter-option-inner-inner').get( 0);
            // if( element != null)
            //     element.textContent = optionLabel;
        }

        function createDropdown( target, filler) {
            const dropdown = $( '<select/>', { 'class': 'selectpicker'});
            if( target == null || target.get( 0) == null)
                return null;
            Array.from( target.get( 0).attributes).map( function ( each) {
                dropdown.attr( each.name, each.value);
            });
            dropdown.append( $( '<option>--</option>'));
            filler.forEach( function ( each) {
                const option = $( '<option/>');
                option.attr( 'value', each[ 'id']);
                option.html( each[ 'description']);
                dropdown.append( option);
            });
            target.parent().replaceWith( dropdown);
            dropdown.selectpicker( 'refresh');

            return dropdown;
        }

        function createMultipleSelectDropdown( target, filler) {
            if( target == null || target.get( 0) == null)
                return null;

            target.empty();

            filler.forEach( function ( each) {
                const option = new Option( each.description, each.id, false, false);
                target.append( option);
            });

            return target;
        }

        function annotateRequired() {
            $( '.serializable').each( function ( index, each) {
                const nodeID = each.nodeName.toLowerCase();
                if( nodeID.search(/div|input/) === -1)
                    return;

                if( nodeID === 'div' && $( each).find( 'select[required]:visible') == null)
                    return;

                $( each).prev( 'label').addClass( 'required');
            });
        }

        function judgementChange(){
            const el = $('#judgement-judgement');
            el.change(
                function (){
                    const el = $('.removable');
                    if($(this).val() === 'Non'){
                        $(el).each((index, element) => {
                            $(element).parent().hide();
                            $(element).removeAttr('required');
                        });
                    }
                    else{
                        $(el).each((index, element) => {
                            $(element).parent().show();
                            $(element).attr('required', '');
                        });
                    }
                }
            );
            el.change();
        }
    });
</script>
