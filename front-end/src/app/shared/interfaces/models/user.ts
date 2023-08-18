export class User{
  "@id" ?:string;//le typage d emes variables
  id: number;
  email: string;
  roles:any = ["ROLE_USER"];
  password:string;
  is_verified:boolean =true;
  lastname: string;
  firstname: string;
  address:string;
  zipcode:number;
  city:string;
}
