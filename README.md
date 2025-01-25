# LifeStream-Blood-Bank-Manager

🏁 Getting Started
LifeStream is a web-based software solution designed to streamline and manage blood bank operations with efficiency and precision. This system enables seamless tracking of blood deposits, withdrawals, donor profiles, and receiver information.
Key Features:
* Comprehensive donor and receiver management
* Detailed donation and receiving history
* Real-time blood stock tracking
* Robust administrative tools for smooth operations


📂 Project File Structure
* database/
  Contains the SQL file for setting up the database.

* docs/
  Includes documentation related to the project.

* res/
  Contains resources like images, fonts, and icons used in the project.


🔧 Installation
1. Create the Database
Set up a new database on your local server named blood_bank.

2. Import the Database
Import the .db file from the database folder into your database.

3. Run the Application
* Place the project folder in the web server's root directory (e.g., htdocs for Apache).
* Open a browser and navigate to: http://localhost/blood-bank


⚙️ Components
Languages
* PHP
* CSS
* SQL

Development Environment
* Windows 10

External Resources/Plugins
* XAMPP (for local server and MySQL)
* Visual Studio Code (for development)
* Google Chrome (for testing)


✨ Scope of the Project
The system's functionalities include:

Admin
* Login: Secure admin login to manage the system.
* Add Person: Register new donors/receivers.
* Search Person: Retrieve details of donors/receivers using a unique P_ID or Aadhar number.
* Update Person: Modify donor/receiver details.
* New Donation: Add new blood donations to the system.
* New Receive: Record new blood withdrawals.
* Check Stock: View available stock details.
* Donation History: View all donations made within a specified time period.
* Receiving History: View all blood withdrawals within a specified time period.
* List Donors: Display eligible donors based on blood group and other criteria.
* Add User: Create login credentials for donors/receivers.
* Delete User: Remove user accounts.

User (Donor/Receiver)
* Login: Secure login to access user-specific features.
* Request Blood: Request blood by specifying the blood group, hospital, and required units.
* My Profile: View personal details, donation history, and receiving details.

