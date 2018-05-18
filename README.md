# SSO-Applied
Integration SSO to Sample Cart project and CT263 project

# About Projects
## Sample Cart
A project for Cart ("giỏ hàng" in Vietnamese) of author Le Nguyen Thuc from author Bui Quoc Huy (qhonline.info)
* Author: Mr. Bui Quoc Huy
* Custom Editor: Mr. Le Nguyen Thuc

## CT263
A student's course in major of Information Systems at Can Tho University
* Mentor: M.S. Phan Tan Tai
* Student: Mr. Quach Hoang Thanh

## SSO Applied
An experimental project for the single sign-on feature (SSO) using Auth0.
* Executor: Ms. Nguyen Thi Tuyet Nghi
* Support of Project Sample Cart: Mr. Le Nguyen Thuc
* Support of Project CT263: Mr. Quach Hoang Thanh
* Platform: Auth0

# Solution
* Access to Sample Cart (as app1) or CT263 (as app2)
* Get cookie with value of user (array type) in app1/app2
* Push AJAX with value cookie from app1/app2 to Auth App
* In Auth App, if isset value of cookie and token of this value, return TRUE
* In app1/app2, if TRUE set new cookie of user by cookie, if FALSE unset cookie 

# References
* Auth0: https://auth0.com/docs

# Thanks for follow!
