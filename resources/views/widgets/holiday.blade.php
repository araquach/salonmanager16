<!--holiday widget partial view-->

<ul class="info list--unstyled">
    <li>Holiday Entitlement: {{ dd($entitlement) }} days</li>
    <li>Total Booked: {{ $total }} days</li>
    <li>Remaining Saturdays:  {{ $remainingSat }}</li>
    <li>Days remaining: {{ $remainingDays }}</li>
</ul>