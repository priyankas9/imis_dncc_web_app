<table>
    <thead>
    <tr>
        <th align="right" width="20"><h1><strong>BIN</strong></h1></th>
        <th align="right" width="20"><h1><strong>Owner Name</strong></h1></th>
        <th align="right" width="20"><h1><strong>Owner NID</strong></h1></th>
        <th align="right" width="20"><h1><strong>Owner Gender</strong></h1></th>
        <th align="right" width="20"><h1><strong>Owner Contact Number</strong></h1></th>
        <th align="right" width="20"><h1><strong>BIN of Main Building</strong></h1></th>
        <th align="right" width="20"><h1><strong>Ward</strong></h1></th>
        <th align="right" width="20"><h1><strong>Road Code</strong></h1></th>
        <th align="right" width="20"><h1><strong>House Number</strong></h1></th>
        <th align="right" width="20"><h1><strong>House Locality/Address</strong></h1></th>
        <th align="right" width="20"><h1><strong>Tax Code/Holding ID</strong></h1></th>
        <th align="right" width="20"><h1><strong>Structure Type</strong></h1></th>
        <th align="right" width="20"><h1><strong>Surveyed Date</strong></h1></th>
        <th align="right" width="20"><h1><strong>Construction Date</strong></h1></th>
        <th align="right" width="20"><h1><strong>Number of Floors</strong></h1></th>
        <th align="right" width="20"><h1><strong>Functional Use of Building</strong></h1></th>
        <th align="right" width="20"><h1><strong>Use Category of Building</strong></h1></th>
        <th align="right" width="20"><h1><strong>Office or Business Name</strong></h1></th>
        <th align="right" width="20"><h1><strong>Number of Households</strong></h1></th>
        <th align="right" width="20"><h1><strong>Male Population</strong></h1></th>
        <th align="right" width="20"><h1><strong>Female Population</strong></h1></th>
        <th align="right" width="20"><h1><strong>Other Population</strong></h1></th>
        <th align="right" width="20"><h1><strong>Population of Building</strong></h1></th>
        <th align="right" width="20"><h1><strong>Differently Abled Male Population</strong></h1></th>
        <th align="right" width="20"><h1><strong>Differently Abled Female Population</strong></h1></th>
        <th align="right" width="20"><h1><strong>Differently Abled Other Population</strong></h1></th>
        <th align="right" width="20"><h1><strong>Is Low Income House</strong></h1></th>
        <th align="right" width="20"><h1><strong>LIC Name</strong></h1></th>
        <th align="right" width="20"><h1><strong>Main Drinking Water Source</strong></h1></th>
        <th align="right" width="20"><h1><strong>Water Supply Customer ID</strong></h1></th>
        <th align="right" width="20"><h1><strong>Water Supply Pipe Line Code</strong></h1></th>
        <th align="right" width="20"><h1><strong>Well in Premises</strong></h1></th>
        <th align="right" width="20"><h1><strong>Distance of Well from Closest Containment (m)</strong></h1></th>
        <th align="right" width="20"><h1><strong>SWM Customer ID</strong></h1></th>
        <th align="right" width="20"><h1><strong>Presence of Toilet</strong></h1></th>
        <th align="right" width="20"><h1><strong>Number of Toilets</strong></h1></th>
        <th align="right" width="20"><h1><strong>Households with Private Toilet</strong></h1></th>
        <th align="right" width="20"><h1><strong>Population with Private Toilet</strong></h1></th>
        <th align="right" width="20"><h1><strong>Toilet Connection</strong></h1></th>
        <th align="right" width="20"><h1><strong>Sewer Code</strong></h1></th>
        <th align="right" width="20"><h1><strong>Drain Code</strong></h1></th>
        <th align="right" width="20"><h1><strong>Building Accessible to Desludging Vehicle</strong></h1></th>
        <th align="right" width="20"><h1><strong>Estimated Area of the Building ( ㎡ )</strong></h1></th>
        <th align="right" width="20"><h1><strong>Community Toilet Name</strong></h1></th>
        <th align="right" width="20"><h1><strong>Verification Status</strong></h1></th>
    </tr>
    </thead>
    <tbody>
    @foreach($buildingResults as $building)
        <tr>
            <td>{{ $building->bin }}</td>
            <td>{{ $building->owner_name }}</td>
            <td>{{ $building->nid }}</td>
            <td>{{ $building->owner_gender }}</td>
            <td>{{ $building->owner_contact }}</td>
            <td>{{ $building->building_associated_to }}</td>
            <td>{{ $building->ward }}</td>
            <td>{{ $building->road_code }}</td>
            <td>{{ $building->house_number }}</td>
            <td>{{ $building->house_locality }}</td>
            <td>{{ $building->tax_code }}</td>
            <td>{{ $building->structure_type }}</td>
            <td>{{ $building->surveyed_date }}</td>
            <td>{{ $building->construction_year }}</td>
            <td>{{ $building->floor_count }}</td>
            <td>{{ $building->functional_use_id }}</td>
            <td>{{ $building->use_category_id }}</td>
            <td>{{ $building->office_business_name }}</td>
            <td>{{ $building->household_served }}</td>
            <td>{{ $building->male_population }}</td>
            <td>{{ $building->female_population }}</td>
            <td>{{ $building->other_population }}</td>
            <td>{{ $building->population_served }}</td>
            <td>{{ $building->diff_abled_male_pop }}</td> 
            <td>{{ $building->diff_abled_female_pop }}</td>
            <td>{{ $building->diff_abled_others_pop }}</td>
            <td>{{ is_null($building->low_income_hh)
            ? ''
            : ($building->low_income_hh === true ? 'Yes' : 'No') }}</td>
            <td>{{ $building->community_name }}</td>
            <td>{{ $building->water_source }}</td>
            <td>{{ $building->water_customer_id }}</td>
            <td>{{ $building->watersupply_pipe_code }}</td>
            <td>{{ is_null($building->well_presence_status)
            ? ''
            : ($building->well_presence_status === true ? 'Yes' : 'No') }}</td>
            <td>{{ $building->distance_from_well }}</td>
            <td>{{ $building->swm_customer_id }}</td> 
            <td>{{ $building->toilet_status ? 'Yes' : 'No' }}</td>
            <td>{{ $building->toilet_count }}</td>
            <td>{{ $building->household_with_private_toilet }}</td>
            <td>{{ $building->population_with_private_toilet }}</td>
            <td>{{ $building->sanitation_system }}</td>
            <td>{{ $building->sewer_code }}</td>
            <td>{{ $building->drain_code }}</td>
            <td>{{ $building->desludging_vehicle_accessible === true ? 'Yes' : 'No' }}</td>
            <td>{{ $building->estimated_area }}</td>
            <td>{{ $building->toilet_name }}</td>
            <td>{{ $building->verification_status ? 'Yes' : 'No'}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
