// JavaScript Concepts Demonstration

// Variables and Arrays
const services = ["Casual Styling", "Corporate Looks", "Event Makeovers", "Wardrobe Curation", "Seasonal Trends"];
const packages = [
  { name: "Basic Glow", features: "1 Styling Session, Wardrobe Tips", price: 999 },
  { name: "Premium Chic", features: "3 Styling Sessions, Makeover Guide, Personalized Lookbook", price: 2499 },
  { name: "Ultimate Vibe", features: "5 Styling Sessions, Photoshoot Support, Shopping Assistance", price: 4499 }
];

// Loops & DOM Manipulation
window.onload = () => {
  let serviceList = document.getElementById("services-list");
  services.forEach(service => {
    let li = document.createElement("li");
    li.textContent = service;
    serviceList.appendChild(li);
  });

  let packageTable = document.getElementById("package-table-body");
  for (let pkg of packages) {
    let row = `<tr><td>${pkg.name}</td><td>${pkg.features}</td><td>₹${pkg.price}</td></tr>`;
    packageTable.innerHTML += row;
  }

  // Show current year using Date
  document.getElementById("year").textContent = new Date().getFullYear();
};

// Functions & Decision Controls
function showGreeting() {
  let hour = new Date().getHours();
  let greeting = hour < 12 ? "Good Morning!" : hour < 18 ? "Good Afternoon!" : "Good Evening!";
  alert(`${greeting} Welcome to VibeCraft Styling Studio ✨`);
}

// Cookies Example
function setCookie(name, value, days) {
  let d = new Date();
  d.setTime(d.getTime() + days*24*60*60*1000);
  document.cookie = `${name}=${value};expires=${d.toUTCString()};path=/`;
}

function savePreferences() {
  let packageChoice = document.querySelector("select[name='package']").value;
  if (packageChoice) {
    setCookie("preferredPackage", packageChoice, 7);
    alert("Your preferences are saved in cookies!");
  }
  return true; // allow form submission
}