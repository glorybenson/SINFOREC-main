<span id="my-data" data-points="{{ json_encode($datas, TRUE) ?? '[]' }}"></span>
<script>
    var allData = document.getElementById("my-data")
    var datas = JSON.parse(allData.getAttribute('data-points'));

    if (datas.mode == 'create') {
        window.onload = dataFilterSelectOnload();
    }


    function dataFilterSelectOnload() {
        var tags = [{
                'id': 'geographical_zone_pay',
                'type': 'pay',
                'childId': 'geographical_zone_region'
            },
            {
                'id': 'geographical_zone_region',
                'type': 'region',
                'childId': 'geographical_zone_department'
            },
            {
                'id': 'geographical_zone_department',
                'type': 'department',
                'childId': 'geographical_zone_arrondissement'
            },
            {
                'id': 'geographical_zone_arrondissement',
                'type': 'arrondissement',
                'childId': 'geographical_zone_commune'
            },
            {
                'id': 'geographical_zone_commune',
                'type': 'commune',
                'childId': 'geographical_zone_centre'
            }
        ]

        for (var i = 0; i < tags.length; i++) {
            var val = tags[i];
            var valueId = document.getElementById(val.id)
            var opts = $(valueId).val()
            if (opts !== 'undefined' && opts.length) {
                dataFilterSelect(valueId, val.type, val.childId)
            }
        }
    }

    function dataFilterSelect(data, type, childId) {
        var opts = $(data).val()
        switch (type) {
            case "pay":
                setData(opts, datas.regions, childId, type)
                return true
                break;
            case "region":
                setData(opts, datas.departments, childId, type)
                return true
                break;
            case "department":
                setData(opts, datas.arrondissements, childId, type)
                break;
            case "arrondissement":
                setData(opts, datas.communes, childId, type)
                break;
            case "commune":
                setData(opts, datas.centre, childId, type)
                break;
            default:
                break;
        }
    }

    function setData(dataIds, arrayData, childId, type) {
        var data = [];
        var dataId = dataIds
        var single = false
        if (!Array.isArray(dataId)) {
            single = true
        }
        arrayData.forEach((content) => {
            if (Array.isArray(dataId)) {
                dataId.forEach(ids => {
                    switch (type) {
                        case "pay":
                            if (ids == content.pay_id) {
                                data.push(content);
                            }
                            break;
                        case "region":
                            if (ids == content.region_id) {
                                data.push(content);
                            }
                            break;
                        case "department":
                            if (ids == content.department_id) {
                                data.push(content);
                            }
                            break;
                        case "arrondissement":
                            if (ids == content.arrondissement_id) {
                                data.push(content);
                            }
                            break;
                        case "commune":
                            if (ids == content.communes) {
                                data.push(content);
                            }
                            break;

                        default:
                            break;
                    }
                })
            } else {
                //    console.log(dataId, content, type)
                single = true;
                switch (type) {
                    case "pay":
                        if (dataId == content.pay_id) {
                            data.push(content);
                        }
                        break;
                    case "region":
                        if (dataId == content.region_id) {
                            data.push(content);
                        }
                        break;
                    case "department":
                        if (dataId == content.department_id) {
                            data.push(content);
                        }
                        break;
                    case "arrondissement":
                        if (dataId == content.arrondissement_id) {
                            data.push(content);
                        }
                        break;
                    case "commune":
                        if (dataId == content.communes) {
                            data.push(content);
                        }
                        break;

                    default:
                        break;
                }
            }
        });
        var selectTag = document.getElementById(childId)
        if (single) {
            selectTag.innerHTML = "<option value=\"\">--</option>";
        } else {
            selectTag.innerHTML = ''
        }
        selectTag.selectedIndex = 0;
        for (let index = 0; index < data.length; index++) {
            const element = data[index];
            selectTag.innerHTML += "<option value=\"" + element.id + "\">" + element.description + "</option>";
        }
    }
</script>
