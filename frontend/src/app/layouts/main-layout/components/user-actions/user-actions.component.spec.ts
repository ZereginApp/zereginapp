import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UserActions } from './user-actions.component';

describe('UserActions', () => {
  let component: UserActions;
  let fixture: ComponentFixture<UserActions>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [UserActions]
    })
    .compileComponents();

    fixture = TestBed.createComponent(UserActions);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
