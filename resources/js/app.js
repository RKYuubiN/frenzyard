import './bootstrap';
import flatpickr from "flatpickr";
import {DataTable, convertJSON} from "simple-datatables";

let expenditureFormBtn = document.getElementById('expenditure-form-btn');
let expenditureForm =  document.getElementById('expenditure-form');
let submitExpenseBtn = document.getElementById('submit-expense');
let expenditureList = document.getElementById('expenditure-list');
let totalSum = document.getElementById('total-sum');

flatpickr("input[type=datetime-local]");
expenditureFormBtn.addEventListener('click',()=>{
    expenditureForm.toggleAttribute('hidden');
})

submitExpenseBtn.addEventListener('click',(e)=>{
    e.preventDefault();
    let date = document.getElementById('date').value;    
    let amount = document.getElementById('amount').value;    
    let category = document.getElementById('category').value;    
    let details = document.getElementById('details').value;
    
    let formdata = [];
    formdata['date']=date;
    formdata['amount']=amount;
    formdata['category']=category;
    formdata['details']=details;
    console.log(formdata);
    submitForm(formdata);
})

const submitForm = async(formdata)=>{
    const response = await fetch('http://localhost:8000/api/expense',{
        method:'POST',
        headers:{
            Accept:'application/json',
            'Content-Type':'application/json',
        },
        body:JSON.stringify({
            date:formdata['date'],
            amount:formdata['amount'],
            category:formdata['category'],
            details:formdata['details']
        })
    });
    const data = await response.json();
    console.log(data);
    if(data.status >=200 && data.status <300){
        alert(data.message);
        console.log(data.data);
        populateData();
    }else{
        console.error(data.message);
    }
}

const addItemToList = (data)=>{
    let element = document.createElement('li');
    element.textContent = `Category: ${data.category} Amount:${data.amount} Details: ${data.details} Date:${data.date}`;
    expenditureList.appendChild(element);
}

const getTotalSumAmount= async()=>{
    const response = await fetch('http://localhost:8000/api/expensesum',{
        method:'GET',
        headers:{
            Accept:'application/json',
            'Content-Type':'application/json',
        }
    });
    const data = await response.json();
    if(data.status >=200 && data.status <300){
        console.log(data.data);
        totalSum.innerText=`Total Sum: ${data.data}`;
    }else{
        console.error(data.message);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    getTotalSumAmount();
    populateData();
});

const datafetch = async()=>{
    const response = await fetch('http://localhost:8000/api/expense',{
        method:'GET',
        headers:{
            Accept:'application/json',
            'Content-Type':'application/json',
        }
    });

    const data = await response.json();
    if(data.status >=200 && data.status <300){
        console.log(data.data);
        return data.data;
    }else{
        console.error(data.message);
    }
}

const populateData = async()=>{
    let data = await datafetch();
    const myTable = document.querySelector("#table"); 
    const dataTable = new DataTable(myTable);
    const convertedData = convertJSON({
        data: JSON.stringify(data)
      })
    dataTable.insert(convertedData)

}

