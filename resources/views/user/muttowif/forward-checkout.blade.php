<form id="forwardForm" action="{{ route('checkout.confirm') }}" method="POST">
    @csrf
    <input type="hidden" name="itemable_type" value="{{ $itemable_type }}">
    <input type="hidden" name="itemable_id" value="{{ $itemable_id }}">
    <input type="hidden" name="quantity" value="1">
    <input type="hidden" name="unit_price" value="{{ $unit_price }}">
</form>

<script>
    document.getElementById('forwardForm').submit();
</script>
