<div id="pcpshowamountID" class="crm-public-form-item crm-section is_anonymous-section">
  <div class="content">
    {$form.pcp_show_amount.html} &nbsp;
    {$form.pcp_show_amount.label}
  </div>
  <div class="clear"></div>
</div>
<script type="text/javascript">
  {literal}
  function showhide_pcpamount() {
    var selectedValue = cj('#pcp_display_in_roll:checked');
    if ( selectedValue.val() > 0) {
      cj('#pcpshowamountID').show();
    }
    else {
      cj('#pcpshowamountID').hide();
    }
  }

  showhide_pcpamount();
  cj('#pcpshowamountID input').attr('checked', true); // better to set default in php instead...
  cj('#pcp_display_in_roll').click(function() {
    showhide_pcpamount();
  });
  {/literal}
</script>

