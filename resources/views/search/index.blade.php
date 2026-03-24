@extends('app.layout');

<form id="call-record-search-form">
  <fieldset>
    <legend><strong>Search Call Records</strong></legend>
    
    <div class="grid">
      <label for="searchQuery">
        Caller Name or Number
        <input 
          type="search" 
          id="searchQuery" 
          name="searchQuery" 
          placeholder="e.g., Jane Doe or 555-1234" 
        />
      </label>

      <label for="callStatus">
        Call Status
        <select id="callStatus" name="callStatus" required>
          <option value="" selected>All Statuses</option>
          <option value="ANSWERED">Answered</option>
          <option value="NO ANSWER">No Answer</option>
          <option value="BUSY">Busy</option>
          <option value="FAILED">Failed</option>
        </select>
      </label>
    </div>

    <div class="grid">
      <label for="startDate">
        Start Date
        <input type="date" id="startDate" name="startDate" />
      </label>

      <label for="endDate">
        End Date
        <input type="date" id="endDate" name="endDate" />
      </label>
    </div>

    <div class="grid">
      <button type="submit">Search Records</button>
      <button type="reset" class="secondary">Clear Filters</button>
    </div>

  </fieldset>
</form>